import React, { useState } from 'react';
import axios from 'axios';
import { Formik } from 'formik';
import {
    Button,
    Dialog,
    DialogContent,
    DialogContentText,
    DialogTitle,
    FormControl,
    TextField,
} from '@material-ui/core';
import { withCookies } from 'react-cookie';

const SignUpForm = props => {
    const { open, handleClose, setUserToken } = props;
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
                <Formik
                    initialValues={{ email: '', password: '', name: '' }}
                    onSubmit={(values, actions) => {
                        if (login) {
                            axios.post('/api/user/login', values).then(
                                res => {
                                    actions.setSubmitting(false);
                                    // setUserToken(res.data.token);
                                    props.cookies.set(
                                        'userToken',
                                        res.data.token,
                                        {
                                            maxAge: 3600, // Will expire after 1hr (value is in number of sec.)
                                        }
                                    );
                                    handleClose();
                                },
                                error => {
                                    actions.setSubmitting(false);
                                    actions.setErrors(error);
                                    actions.setStatus({
                                        msg:
                                            'Set some arbitrary status or data',
                                    });
                                }
                            );
                        }
                    }}
                    render={({
                        values,
                        errors,
                        status,
                        touched,
                        handleBlur,
                        handleChange,
                        handleSubmit,
                        isSubmitting,
                    }) => (
                        <form onSubmit={handleSubmit}>
                            <FormControl fullWidth>
                                <TextField
                                    autoFocus
                                    onChange={handleChange}
                                    label="Email address"
                                    id="email"
                                    type="email"
                                    fullWidth
                                    variant="outlined"
                                    margin="normal"
                                    value={values.email}
                                    required
                                />
                                {errors.email && (
                                    <DialogContentText>
                                        {errors.email}
                                    </DialogContentText>
                                )}
                                <TextField
                                    onChange={handleChange}
                                    label="Password"
                                    id="password"
                                    type="password"
                                    fullWidth
                                    variant="outlined"
                                    margin="normal"
                                    value={values.password}
                                    required
                                />
                                {errors.password && (
                                    <DialogContentText>
                                        {errors.password}
                                    </DialogContentText>
                                )}
                                {signup && (
                                    <TextField
                                        onChange={handleChange}
                                        label="First name"
                                        id="name"
                                        type="First Name"
                                        fullWidth
                                        variant="outlined"
                                        margin="normal"
                                        value={values.name}
                                        required
                                    />
                                )}
                                {errors.name && (
                                    <DialogContentText>
                                        {errors.name}
                                    </DialogContentText>
                                )}
                            </FormControl>
                            {signup && (
                                <Button
                                    type="submit"
                                    disabled={isSubmitting}
                                    variant="contained"
                                    color="primary"
                                    fullWidth
                                >
                                    Sign Up
                                </Button>
                            )}
                            {login && (
                                <Button
                                    type="submit"
                                    disabled={isSubmitting}
                                    variant="contained"
                                    color="primary"
                                    fullWidth
                                >
                                    Login
                                </Button>
                            )}
                        </form>
                    )}
                />
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

export default withCookies(SignUpForm);
