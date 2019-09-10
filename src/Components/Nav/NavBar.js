import React from 'react';
import { AppBar, Toolbar, Typography, InputBase } from '@material-ui/core';
import { fade, makeStyles } from '@material-ui/core/styles';

const useStyles = makeStyles(theme => ({
    navBar: {
        backgroundColor: '#fff',
        boxShadow: "0 14px 28px rgba(0,0,0,0.25)" },
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
        fontSize: 36
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

const NavBar = () => {
    const classes = useStyles();

    return (<AppBar position="sticky">
                <Toolbar className={classes.navBar}>
                <Typography className={classes.title} variant="h6" noWrap>
            Nemo
          </Typography>
                    <div className={classes.search}>
                        <div className={classes.searchIcon}>
                            {/* <SearchIcon /> */}
                        </div>
                        <InputBase
                            placeholder="Search…"
                            classes={{
                                root: classes.inputRoot,
                                input: classes.inputInput,
                            }}
                            inputProps={{ 'aria-label': 'search' }}
                        />
                    </div>
                </Toolbar>
            </AppBar>)
}

export default NavBar