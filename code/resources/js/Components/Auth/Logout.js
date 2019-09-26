import React, { useEffect } from 'react';
import { Typography } from '@material-ui/core';
import { withCookies } from 'react-cookie';

const Logout = ({ cookies, setUser, setUserToken, user, userToken }) => {
    useEffect(() => {
        setUser(null);
        setUserToken(null);
        cookies.remove('userToken');
        cookies.remove('user');
    }, [user, userToken]);
    return <Typography variant={'h1'}>You are logged out</Typography>;
};

export default withCookies(Logout);
