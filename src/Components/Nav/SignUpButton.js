import React, { useState } from 'react';
import { Button } from '@material-ui/core';
import SignUpForm from '../Modular/SignUpForm';

const SignUpButton = props => {
    const { setUserToken } = props;
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
            {open && (
                <SignUpForm
                    open={open}
                    handleClose={handleClose}
                    setUserToken={setUserToken}
                />
            )}
        </>
    );
};

export default SignUpButton;
