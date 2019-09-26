import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { useRoutes } from 'hookrouter';
import { withCookies } from 'react-cookie';
import ImageGridContainer from './GridImages/ImageGridContainer';
import SingleImageContainer from './SingleImage/SingleImageContainer';
import SignUpForm from './Modular/SignUpForm';
import NotFoundPage from './NotFoundPage';
import NavBar from './Nav/NavBar';
import ImageForm from './Modular/ImageForm';

import MuiThemeProvider from '@material-ui/core/styles/MuiThemeProvider';
import muiTheme from '../theme/muiTheme';

const App = props => {
    const [openImageForm, setOpenImageForm] = useState(false);
    const [userToken, setUserToken] = useState();
    const [user, setUser] = useState();

    useEffect(() => {
        setUserToken(props.cookies.get('userToken'));
    });

    useEffect(() => {
        axios
            .get('/api/user/details', {
                headers: {
                    Authorization: 'Bearer ' + userToken,
                },
            })
            .then(res => {
                props.cookies.set('user', res.data.user, {
                    maxAge: 3600, // Will expire after 1hr (value is in number of sec.)
                });
            })
            .catch(err => console.log(err));
    }, [userToken]);

    useEffect(() => {
        setUser(props.cookies.get('user'));
    });

    const handleClickImageForm = () => {
        setOpenImageForm(!openImageForm);
    };

    const routes = {
        '/': () => <ImageGridContainer />,
        '/home': () => <ImageGridContainer />,
        '/login': () => <SignUpForm open={true} setUserToken={setUserToken} />,
        '/signup': () => <SignUpForm open={true} setUserToken={setUserToken} />,
        '/p/:id': ({ id }) => <SingleImageContainer id={id} />,
        '/whoops': () => <NotFoundPage />,
    };

    const routeResult = useRoutes(routes);
    return (
        <MuiThemeProvider theme={muiTheme}>
            <NavBar
                handleClickImageForm={handleClickImageForm}
                setUserToken={setUserToken}
                user={user}
            />
            {openImageForm && user && (
                <ImageForm
                    open={openImageForm}
                    handleClose={handleClickImageForm}
                />
            )}
            {openImageForm && !user && (
                <SignUpForm open={true} setUserToken={setUserToken} />
            )}
            {routeResult || <NotFoundPage />}
        </MuiThemeProvider>
    );
};

export default withCookies(App);
