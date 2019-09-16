import React, { useState, useEffect } from 'react';
import axios from 'axios';
import {
    Button,
    Checkbox,
    Dialog,
    DialogContent,
    DialogContentText,
    DialogTitle,
    FormGroup,
    FormControlLabel,
    TextField,
} from '@material-ui/core';

import ImageUpload from './ImageUpload';

const PhotoForm = props => {
    const { open, handleClose } = props;
    const [categories, setCategories] = useState([]);
    const [categoriesSelected, setCategoriesSelected] = useState({});

    const fetchCategories = () => {
        axios
            .get('http://localhost:8000/api/categories')
            .then(res => {
                let fetchedCategories = res.data.map(cat => cat.name);
                setCategories(['All', ...fetchedCategories]);
                let categorySelection = fetchedCategories.reduce((acc, cat) => {
                    acc[cat] = false;
                    return acc;
                }, {});
                console.log(categorySelection);
                setCategoriesSelected(categorySelection);
            })
            .catch(err => console.log(err));
    };

    useEffect(() => {
        fetchCategories();
    }, []);

    const handleCategoryCheckbox = name => event => {
        setCategoriesSelected({
            ...categoriesSelected,
            [name]: event.target.checked,
        });
    };

    return (
        <Dialog
            open={open}
            onClose={handleClose}
            aria-labelledby="form-dialog-title"
        >
            <DialogTitle>Submit Your Photos</DialogTitle>
            <DialogContent>
                <DialogContentText>Blah blah blahs</DialogContentText>
                <ImageUpload />
                <TextField
                    autoFocus
                    margin="dense"
                    label="Write a caption..."
                    id="note"
                    type="text"
                    fullWidth
                />
                <FormGroup>
                    {categories &&
                        categories.map(cat => {
                            if (cat === 'All') return null;
                            return (
                                <FormControlLabel
                                    control={
                                        <Checkbox
                                            checked={
                                                categoriesSelected[cat.name]
                                            }
                                            onChange={handleCategoryCheckbox(
                                                cat
                                            )}
                                            value={cat}
                                        />
                                    }
                                    label={cat}
                                />
                            );
                        })}
                </FormGroup>
                <TextField
                    autoFocus
                    margin="dense"
                    label="location"
                    id="location"
                    type="text"
                    fullWidth
                />
                <Button variant="contained" color="primary" fullWidth>
                    Submit
                </Button>
            </DialogContent>
        </Dialog>
    );
};

export default PhotoForm;
