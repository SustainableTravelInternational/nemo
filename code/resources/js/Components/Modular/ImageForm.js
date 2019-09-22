import React, { useState, useEffect } from 'react';
import axios from 'axios';
import ImageUpload from './ImageUpload';

import {
    Button,
    Checkbox,
    Typography,
    FormGroup,
    FormControlLabel,
    Grid,
    Paper,
    TextField,
} from '@material-ui/core';
import StyleConstants from '../../theme/StyleConstants';

const ImageForm = props => {
    const { open, handleClose } = props;
    const [categories, setCategories] = useState([]);
    const [categoriesSelected, setCategoriesSelected] = useState({});

    const fetchCategories = () => {
        axios
            .get('/api/categories')
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

    const [selectedDate, setSelectedDate] = useState(new Date());

    const handleDateChange = date => {
        setSelectedDate(date);
    };

    return (
        <Paper
            open={open}
            onClose={handleClose}
            aria-labelledby="form-dialog-title"
            style={{
                maxWidth: StyleConstants.maxWidth,
                margin: '20px auto',
                padding: 20,
                backgroundColor: '#f8f8f8',
            }}
        >
            <Grid container spacing={2}>
                <Grid item xs={12}>
                    <Typography variant="h6">Your Images</Typography>
                    <Typography variant="body">
                        You can add info to multiple images at once or
                        individually
                    </Typography>
                    <ImageUpload />
                </Grid>
                <Grid item xs={6}>
                    <Typography variant="h6">Location</Typography>
                    <Typography variant="body">
                        The approximate location of where you took the image{' '}
                    </Typography>
                    <TextField
                        autoFocus
                        margin="dense"
                        label="location"
                        id="location"
                        type="text"
                        fullWidth
                    />
                    <div style={{ height: 400 }}></div>
                </Grid>
                <Grid container item xs={6}>
                    <Grid item xs={12}>
                        <Typography variant="h6">Categories</Typography>
                        <FormGroup>
                            {categories &&
                                categories.map(cat => {
                                    if (cat === 'All') return null;
                                    return (
                                        <FormControlLabel
                                            control={
                                                <Checkbox
                                                    checked={
                                                        categoriesSelected[
                                                            cat.name
                                                        ]
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
                    </Grid>
                    <Grid item xs={12}>
                        <Typography variant="h6">Notes</Typography>
                        <TextField
                            autoFocus
                            margin="dense"
                            placeholder="E.g. Diseased coral spotted this morning"
                            id="note"
                            multiline
                            type="text"
                        />
                    </Grid>
                    <Grid item xs={12}>
                        <Typography variant="h6">More info</Typography>

                        <TextField
                            id="date"
                            label="Date"
                            type="date"
                            defaultValue={selectedDate}
                            InputLabelProps={{
                                shrink: true,
                            }}
                        />
                        <TextField
                            id="time"
                            label="Time"
                            type="time"
                            InputLabelProps={{
                                shrink: true,
                            }}
                        />
                    </Grid>
                </Grid>
                <Grid container item justify="flex-end">
                    <Button color="primary">Cancel</Button>
                    <Button variant="contained" color="primary">
                        Post photos
                    </Button>
                </Grid>
            </Grid>
        </Paper>
    );
};

export default ImageForm;
