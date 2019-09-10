import React from 'react';
import { useRoutes } from 'hookrouter';
import HomePage from './Components/HomePage';
import SingleImageContainer from './Components/SingleImage/SingleImageContainer';
import NotFoundPage from './Components/NotFoundPage';

const App = () => {
    const routes = {
        '/': () => <HomePage />,
        '/p/:id': ({ id }) => <SingleImageContainer id={id} />,
        '/whoops': () => <NotFoundPage />,
    };

    const routeResult = useRoutes(routes);
    return routeResult || <NotFoundPage />;
};

export default App;
