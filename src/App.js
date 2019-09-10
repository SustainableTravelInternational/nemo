import React from 'react';
import { useRoutes } from 'hookrouter';
import ImageGridContainer from './Components/GridImages/ImageGridContainer';
import SingleImageContainer from './Components/SingleImage/SingleImageContainer';
import NotFoundPage from './Components/NotFoundPage';
import NavBar from './Components/Nav/NavBar'

import MuiThemeProvider from '@material-ui/core/styles/MuiThemeProvider';
import muiTheme from './theme/muiTheme';



const App = () => {
    const routes = {
        '/': () => <ImageGridContainer />,
        '/p/:id': ({ id }) => <SingleImageContainer id={id} />,
        '/whoops': () => <NotFoundPage />,
    };

    const routeResult = useRoutes(routes);
    return (
        <MuiThemeProvider theme={muiTheme}>
            <NavBar />
            {routeResult || <NotFoundPage />}
        </MuiThemeProvider>
    );
};

export default App;
