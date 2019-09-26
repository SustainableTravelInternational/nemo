import React, { useState } from 'react';
import { Dialog, DialogTitle } from '@material-ui/core';

import SignUpForm from './SignUpForm';
import LoginForm from './LoginForm';

const AuthDialog = ({ handleClose, open }) => {
    const [signup, setSignup] = useState(true);
    const [login, setLogin] = useState(false);

    const renderForm = (e, formType) => {
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
            {signup && (
                <SignUpForm handleClose={handleClose} renderForm={renderForm} />
            )}
            {login && (
                <LoginForm handleClose={handleClose} renderForm={renderForm} />
            )}
        </Dialog>
    );
};

export default AuthDialog;
