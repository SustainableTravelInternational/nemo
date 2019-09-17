import React from 'react';
import { AppBar, Toolbar, IconButton } from '@material-ui/core';
import { fade, makeStyles } from '@material-ui/core/styles';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faSearch } from '@fortawesome/free-solid-svg-icons';
import SubmitPhotoButton from './SubmitPhotoButton';
import SignUpButton from './SignUpButton';
import logo from './logo.png';

const useStyles = makeStyles(theme => ({
    appBar: {
        backgroundColor: '#fff',
        boxShadow: '0 14px 28px rgba(0,0,0,0.25)',
    },
    toolBar: {
        marginLeft: 'calc((100vw - 960px)/2)',
        marginRight: 'calc((100vw - 960px)/2)',
    },
    logo: {
        height: 30,
        padding: 5,
    },
    root: {
        flexGrow: 1,
    },
    title: {
        flexGrow: 1,
        display: 'none',
        [theme.breakpoints.up('sm')]: {
            display: 'block',
        },
        color: '#28b7b2',
        fontSize: 36,
    },
    search: {
        position: 'relative',
        borderRadius: theme.shape.borderRadius,
        backgroundColor: fade(theme.palette.common.white, 0.15),
        '&:hover': {
            backgroundColor: fade(theme.palette.common.white, 0.25),
        },
        marginLeft: 0,
        width: '100%',
        [theme.breakpoints.up('sm')]: {
            marginLeft: theme.spacing(1),
            width: 'auto',
        },
    },
    inputRoot: {
        color: 'inherit',
    },
    inputInput: {
        padding: theme.spacing(1, 1, 1, 7),
        transition: theme.transitions.create('width'),
        width: '100%',
        [theme.breakpoints.up('sm')]: {
            width: 120,
            '&:focus': {
                width: 200,
            },
        },
    },
}));

const NavBar = props => {
    const classes = useStyles();
    const { handleClickImageForm, setUserToken, setUser } = props;

    return (
        <AppBar position="sticky" className={classes.appBar}>
            <Toolbar className={classes.toolBar}>
                <div style={{ flexGrow: 1, flexBasis: 400 }}>
                    <img className={classes.logo} src={logo} alt={'NEMO'} />
                </div>
                <SubmitPhotoButton handleClick={handleClickImageForm} />
                <SignUpButton setUserToken={setUserToken} setUser={setUser} />
                <IconButton
                    color="primary"
                    style={{ padding: 5 }}
                    aria-label="search"
                >
                    <FontAwesomeIcon
                        icon={faSearch}
                        style={{ padding: 5, fontSize: '1rem' }}
                    />
                </IconButton>
                {/* <div className={classes.search}> */}
                {/*<div className={classes.searchIcon}>
                         <SearchIcon /> 
                    </div>
                    <InputBase
                        placeholder="Search…"
                        classes={{
                            root: classes.inputRoot,
                            input: classes.inputInput,
                        }}
                        inputProps={{ 'aria-label': 'search' }}
                    /> */}
                {/* </div> */}
            </Toolbar>
        </AppBar>
    );
};

export default NavBar;
