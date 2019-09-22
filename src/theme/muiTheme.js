import { createMuiTheme } from '@material-ui/core/styles';
import StyleConstants from './StyleConstants';

const theme = createMuiTheme({
    typography: {
        useNextVariants: true,
    },
    shadows: ['none'],
    palette: {
        primary: {
            light: StyleConstants.colors.primary.light,
            main: StyleConstants.colors.primary.main,
            dark: StyleConstants.colors.primary.dark,
            contrastText: '#fff',
        },
        secondary: {
            light: StyleConstants.colors.secondary.light,
            main: StyleConstants.colors.secondary.main,
            dark: StyleConstants.colors.secondary.dark,
            contrastText: '#fff',
        },
    },
    overrides: {
        MuiButton: {
            root: {
                borderRadius: 25,
                margin: 10,
                paddingLeft: 20,
                paddingRight: 20,
                textTransform: 'unset',
                fontWeight: 'unset',
            },
        },
    },
});

export default theme;
