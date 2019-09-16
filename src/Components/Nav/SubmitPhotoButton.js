import React, { useState } from 'react';
import { Button } from '@material-ui/core';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faPlus } from '@fortawesome/free-solid-svg-icons';
import PhotoForm from '../Modular/PhotoForm';

const SubmitPhotoButton = props => {
    const [open, setOpen] = useState(false);

    const handleClickOpen = () => {
        setOpen(true);
    };

    const handleClose = () => {
        setOpen(false);
    };

    return (
        <>
            <Button
                variant="contained"
                color="primary"
                onClick={handleClickOpen}
            >
                <FontAwesomeIcon icon={faPlus} style={{ paddingRight: 5 }} />
                Submit your photos
            </Button>
            {open && <PhotoForm open={open} handleClose={handleClose} />}
        </>
    );
};

export default SubmitPhotoButton;
