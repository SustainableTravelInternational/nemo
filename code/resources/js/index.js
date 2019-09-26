import React from 'react';
import ReactDOM from 'react-dom';
import { CookiesProvider } from 'react-cookie';

import App from './Components/App';

ReactDOM.render(
    <CookiesProvider>
        <App />
    </CookiesProvider>,

    document.querySelector('#root')
);
