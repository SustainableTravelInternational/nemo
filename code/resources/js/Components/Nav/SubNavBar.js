import React, { useState } from 'react';
import CategoryFilter from './CategoryFilter';
import { Button, ButtonGroup } from '@material-ui/core';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faFilter, faMap } from '@fortawesome/free-solid-svg-icons';

const SubNavBar = ({ categories, setSelectedCategory }) => {
    const [filterOpen, setFilterOpen] = useState(false);
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
        <div
            style={{
                display: 'flex',
                justifyContent: 'center',
                position: 'sticky',
                top: 75,
                zIndex: 12,
                width: '100%',
            }}
        >
            <ButtonGroup
                variant={'contained'}
                color={'primary'}
                size={'small'}
                aria-label={'small contained primary button group'}
            >
                <Button
                    ref={anchorRef}
                    onClick={handleFilterToggle}
                    style={{
                        marginRight: 1,
                        width: 120,
                        display: 'flex',
                        justifyContent: 'space-around',
                    }}
                >
                    <FontAwesomeIcon
                        icon={faFilter}
                        style={{ padding: '0 5px' }}
                    />{' '}
                    Filter
                </Button>
                <Button
                    style={{
                        marginLeft: 1,
                        width: 120,
                        display: 'flex',
                        justifyContent: 'space-around',
                    }}
                >
                    <FontAwesomeIcon
                        icon={faMap}
                        style={{ padding: '0 5px' }}
                    />{' '}
                    Map view
                </Button>
            </ButtonGroup>
            <CategoryFilter
                anchorRef={anchorRef}
                categories={categories}
                handleCategorySelection={handleCategorySelection}
                handleClose={handleClose}
                filterOpen={filterOpen}
            />
        </div>
    );
};

export default SubNavBar;
