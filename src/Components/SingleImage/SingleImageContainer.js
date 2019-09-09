import React from 'react';
import './SingleImageContainer.css';

const SingleImageContainer = props => {
    const { image, changeView } = props;
    return (
        <div className={'SingleImageContainer'}>
            <img
                onClick={() => changeView('ImageGridContainer')}
                src={image.imageUrl}
                className={'ImageCard_image'}
                alt={'Nemo'}
            />
        </div>
    );
};

export default SingleImageContainer;
