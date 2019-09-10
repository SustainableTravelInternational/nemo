import { createMuiTheme } from '@material-ui/core/styles';

const theme = createMuiTheme({
    typography: {
        useNextVariants: true,
    },
    shadows: ["none"],
    palette: {
        primary: {
            light: '#03a9f4',
            main: '#28b7b2',
            dark: '#03a9f4',
            contrastText: '#fff',
        },
        secondary: {
            light: '#f79620',
            main: '#f79620',
            dark: '#f79620',
            contrastText: '#fff',
        },
    }
});

export default theme;
