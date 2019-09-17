import React, { useState, useEffect } from 'react';
import { useRoutes } from 'hookrouter';
import ImageGridContainer from './Components/GridImages/ImageGridContainer';
import SingleImageContainer from './Components/SingleImage/SingleImageContainer';
import NotFoundPage from './Components/NotFoundPage';
import NavBar from './Components/Nav/NavBar';
import ImageForm from './Components/Modular/ImageForm';

import MuiThemeProvider from '@material-ui/core/styles/MuiThemeProvider';
import muiTheme from './theme/muiTheme';

const App = () => {
    const [openImageForm, setOpenImageForm] = useState(false);
    const [userToken, setUserToken] = useState('');
    const [user, setUser] = useState();

    const handleClickImageForm = () => {
        setOpenImageForm(!openImageForm);
    };

    const routes = {
        '/': () => <ImageGridContainer />,
        '/p/:id': ({ id }) => <SingleImageContainer id={id} />,
        '/whoops': () => <NotFoundPage />,
    };

    const routeResult = useRoutes(routes);
    return (
        <MuiThemeProvider theme={muiTheme}>
            <NavBar
                handleClickImageForm={handleClickImageForm}
                setUserToken={setUserToken}
                setUser={setUser}
            />
            {openImageForm && (
                <ImageForm
                    open={openImageForm}
                    handleClose={handleClickImageForm}
                />
            )}
            {routeResult || <NotFoundPage />}
        </MuiThemeProvider>
    );
};

export default App;
