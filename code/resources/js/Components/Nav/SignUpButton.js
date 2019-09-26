import React, { useState } from 'react';
import { Button } from '@material-ui/core';
import AuthDialog from '../Auth/AuthDialog';

const SignUpButton = props => {
    const [open, setOpen] = useState(false);

    const handleClickOpen = () => {
        setOpen(true);
    };

    const handleClose = () => {
        setOpen(false);
    };

    return (
        <>
            <Button color="primary" onClick={handleClickOpen}>
                Sign Up
            </Button>
            {open && <AuthDialog open={open} handleClose={handleClose} />}
        </>
    );
};

export default SignUpButton;
