import React from 'react';
import {
    ClickAwayListener,
    Grow,
    MenuList,
    MenuItem,
    Paper,
    Popper,
} from '@material-ui/core';

const CategoryFilter = ({
    anchorRef,
    categories,
    handleCategorySelection,
    handleClose,
    filterOpen,
}) => {
    return (
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
                        transformOrigin: placement === 'center bottom',
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
    );
};

export default CategoryFilter;
