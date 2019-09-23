import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { useRoutes } from 'hookrouter';
import ImageGridContainer from './Components/GridImages/ImageGridContainer';
import SingleImageContainer from './Components/SingleImage/SingleImageContainer';
import SignUpForm from './Components/Modular/SignUpForm';
import NotFoundPage from './Components/NotFoundPage';
import NavBar from './Components/Nav/NavBar';
import ImageForm from './Components/Modular/ImageForm';

import MuiThemeProvider from '@material-ui/core/styles/MuiThemeProvider';
import muiTheme from './theme/muiTheme';

const Home = () => {
    const [openImageForm, setOpenImageForm] = useState(false);
    const [userToken, setUserToken] = useState();
    const [user, setUser] = useState();

    useEffect(() => {
        axios
            .get('/api/user/details', {
                headers: {
                    Authorization: 'Bearer ' + userToken,
                },
            })
            .then(res => setUser(res.data.user))
            .catch(err => console.log(err));
    }, [userToken]);

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
            {openImageForm && !user && <SignUpForm open={true} setUserToken={setUserToken} />}
            {routeResult || <NotFoundPage />}
        </MuiThemeProvider>
    );
};

export default Home;