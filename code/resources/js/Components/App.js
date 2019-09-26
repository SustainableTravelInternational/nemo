import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { useRoutes } from 'hookrouter';
import { withCookies } from 'react-cookie';

import AuthDialog from './Auth/AuthDialog';
import ImageForm from './Modular/ImageForm';
import ImageGridContainer from './GridImages/ImageGridContainer';
import Logout from './Auth/Logout';
import NavBar from './Nav/NavBar';
import NotFoundPage from './NotFoundPage';
import SingleImageContainer from './SingleImage/SingleImageContainer';

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
        if (userToken) {
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
                .then(_ => {
                    setUser(props.cookies.get('user'));
                })
                .catch(err => console.log(err));
        }
    }, [userToken]);

    const handleClickImageForm = () => {
        setOpenImageForm(!openImageForm);
    };

    const routes = {
        '/': () => <ImageGridContainer />,
        '/home': () => <ImageGridContainer />,
        '/login': () => <AuthDialog open={true} />,
        '/logout': () => (
            <Logout
                setUserToken={setUserToken}
                setUser={setUser}
                userToken={userToken}
                user={user}
            />
        ),
        '/signup': () => <AuthDialog open={true} />,
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
            {openImageForm && !user && <AuthDialog open={true} />}
            {routeResult || <NotFoundPage />}
        </MuiThemeProvider>
    );
};

export default withCookies(App);
