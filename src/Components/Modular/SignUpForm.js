import React from 'react';
import {
    Button,
    Dialog,
    DialogContent,
    DialogContentText,
    DialogTitle,
    TextField,
} from '@material-ui/core';


const SignUpForm = props => {
    const { open, handleClose } = props;

    return (
        <Dialog
            open={open}
            onClose={handleClose}
            aria-labelledby="form-dialog-title"
            maxWidth={"xs"}
        >
            <DialogTitle>Create your account</DialogTitle>
            <DialogContent>
                <DialogContentText>You are a few steps away from sharing. We just need some extra details about you:</DialogContentText>
                <TextField
                    autoFocus
                    label="Email address"
                    id="email"
                    type="email"
                    fullWidth
                    variant="outlined"
                    margin="normal"
                />
                <TextField
                    autoFocus
                    label="Password"
                    id="password"
                    type="password"
                    fullWidth
                    variant="outlined"
                    margin="normal"
                />
                <TextField
                    autoFocus
                    label="First name"
                    id="firstName"
                    type="First Name"
                    fullWidth
                    variant="outlined"
                    margin="normal"
                />
                <Button variant="contained" color="primary" fullWidth>
                    Sign Up
                </Button>
                <DialogContentText>If you already have an account, login here</DialogContentText>
            </DialogContent>
        </Dialog>
    );
};

export default SignUpForm;
