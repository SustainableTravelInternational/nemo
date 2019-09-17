import React, { useState } from 'react';
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
    const [signup, setSignup] = useState(true);
    const [login, setLogin] = useState(false);
    const RenderForm = (e, formType) => {
        e.preventDefault();
        if (formType === 'login') {
            setSignup(false);
            setLogin(true);
        } else {
            setSignup(true);
            setLogin(false);
        }
    };

    return (
        <Dialog
            open={open}
            onClose={handleClose}
            aria-labelledby="form-dialog-title"
            maxWidth={'xs'}
        >
            {signup && <DialogTitle>Create your account</DialogTitle>}
            {login && <DialogTitle>Login</DialogTitle>}
            <DialogContent>
                {signup && (
                    <DialogContentText>
                        Sign up to share your photos to help save our reefs.
                    </DialogContentText>
                )}
                {login && (
                    <DialogContentText>
                        Login to share your photos to help save our reefs.
                    </DialogContentText>
                )}

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
                    label="Password"
                    id="password"
                    type="password"
                    fullWidth
                    variant="outlined"
                    margin="normal"
                />
                {signup && (
                    <TextField
                        label="First name"
                        id="firstName"
                        type="First Name"
                        fullWidth
                        variant="outlined"
                        margin="normal"
                    />
                )}
                {signup && (
                    <Button variant="contained" color="primary" fullWidth>
                        Sign Up
                    </Button>
                )}
                {login && (
                    <Button variant="contained" color="primary" fullWidth>
                        Login
                    </Button>
                )}
                {signup && (
                    <DialogContentText>
                        If you already have an account,{' '}
                        <a href="/" onClick={e => RenderForm(e, 'login')}>
                            login here
                        </a>
                    </DialogContentText>
                )}
                {login && (
                    <DialogContentText>
                        If you haven't got an account,{' '}
                        <a href="/" onClick={e => RenderForm(e, 'signup')}>
                            signup here
                        </a>
                    </DialogContentText>
                )}
            </DialogContent>
        </Dialog>
    );
};

export default SignUpForm;
