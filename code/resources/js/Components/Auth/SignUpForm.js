import React, { useState } from 'react';
import axios from 'axios';
import { Formik } from 'formik';
import {
    Button,
    DialogContent,
    DialogContentText,
    DialogTitle,
    FormControl,
    TextField,
} from '@material-ui/core';
import { withCookies } from 'react-cookie';

const SignUpForm = ({ cookies, handleClose, renderForm, setUserToken }) => {
    return (
        <>
            <DialogTitle>Create your account</DialogTitle>

            <DialogContent>
                <DialogContentText>
                    Sign up to share your photos to help save our reefs.
                </DialogContentText>

                <Formik
                    initialValues={{ email: '', password: '', name: '' }}
                    onSubmit={(values, actions) => {
                        axios.post('/api/user/sigup', values).then(
                            res => {
                                actions.setSubmitting(false);
                                cookies.set('userToken', res.data.token, {
                                    maxAge: 3600, // Will expire after 1hr (value is in number of sec.)
                                });
                                handleClose();
                            },
                            error => {
                                actions.setSubmitting(false);
                                actions.setErrors(error);
                                actions.setStatus({
                                    msg: 'Set some arbitrary status or data',
                                });
                            }
                        );
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
                                {errors.name && (
                                    <DialogContentText>
                                        {errors.name}
                                    </DialogContentText>
                                )}
                            </FormControl>
                            <Button
                                type="submit"
                                disabled={isSubmitting}
                                variant="contained"
                                color="primary"
                                fullWidth
                            >
                                Sign Up
                            </Button>
                        </form>
                    )}
                />

                <DialogContentText>
                    If you already have an account,{' '}
                    <a href="/" onClick={e => renderForm(e, 'login')}>
                        login here
                    </a>
                </DialogContentText>
            </DialogContent>
        </>
    );
};

export default withCookies(SignUpForm);
