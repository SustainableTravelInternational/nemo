import React, { useState } from 'react';
import {
    ClickAwayListener,
    Button,
    ButtonGroup,
    Grow,
    MenuList,
    MenuItem,
    Paper,
    Popper,
} from '@material-ui/core';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faFilter, faMap } from '@fortawesome/free-solid-svg-icons';

const SubNavBar = props => {
    const [filterOpen, setFilterOpen] = useState(false);
    const { categories, setSelectedCategory } = props;
    const anchorRef = React.useRef(null);

    const handleFilterToggle = () => {
        setFilterOpen(prevOpen => !prevOpen);
    };

    const handleClose = event => {
        if (anchorRef.current && anchorRef.current.contains(event.target)) {
            return;
        }

        setFilterOpen(false);
    };

    const handleCategorySelection = (event, category) => {
        setSelectedCategory(category);
        handleClose(event);
    };

    

    return (
        <div style={{display: 'flex', justifyContent: 'center', position: 'sticky', top: 75, zIndex: 12, width: '100%'}}>
            <ButtonGroup
                variant="contained"
                color="primary"
                size="small"
                aria-label="small contained primary button group"
            >
                <Button ref={anchorRef} onClick={handleFilterToggle} style={{marginRight: 0}}>
                    <FontAwesomeIcon
                        icon={faFilter}
                        style={{ paddingRight: 5 }}
                    />{' '}
                    Filter
                </Button>
                <Button style={{marginLeft: 0}}>
                    <FontAwesomeIcon icon={faMap} style={{ paddingRight: 5 }} />{' '}
                    Map
                </Button>
            </ButtonGroup>
            <Popper
                open={filterOpen}
                anchorEl={anchorRef.current}
                transition
                disablePortal
            >
                {({ TransitionProps, placement }) => (
                    <Grow
                        {...TransitionProps}
                        style={{
                            transformOrigin:
                                placement === 'bottom'
                                    ? 'center top'
                                    : 'center bottom',
                        }}
                    >
                        <Paper id="menu-list-grow">
                            <ClickAwayListener onClickAway={handleClose}>
                                <MenuList>
                                    {categories &&
                                        categories.map(category => (
                                            <MenuItem
                                                onClick={event =>
                                                    handleCategorySelection(
                                                        event,
                                                        category
                                                    )
                                                }
                                                key={category}
                                            >
                                                {category}
                                            </MenuItem>
                                        ))}
                                </MenuList>
                            </ClickAwayListener>
                        </Paper>
                    </Grow>
                )}
            </Popper>
        </div>
    );
};

export default SubNavBar;
