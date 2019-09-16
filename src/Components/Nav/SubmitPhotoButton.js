import React, { useState } from 'react';
import { Button } from '@material-ui/core';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faPlus } from '@fortawesome/free-solid-svg-icons';

const SubmitPhotoButton = props => {
    const { handleClick } = props;
    return (
        <Button variant="contained" color="primary" onClick={handleClick}>
            <FontAwesomeIcon icon={faPlus} style={{ paddingRight: 5 }} />
            Submit your photos
        </Button>
    );
};

export default SubmitPhotoButton;
