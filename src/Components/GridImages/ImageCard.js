import React, { useState } from 'react';
import { navigate } from 'hookrouter';
import './ImageCard.css';

const ImageCard = props => {
    const [hover, setHover] = useState(false);
    const { image } = props;
    const ImageCardHoverClasses = hover
        ? 'ImageCard_Hover-active'
        : 'ImageCard_Hover-inactive';

    const navigateToSingleImage = () => {
        navigate(`/p/${image.id}`);
        window.location.reload();
    };

    return (
        <div
            className={`ImageCard`}
            onClick={() => navigateToSingleImage()}
            onMouseEnter={() => setHover(true)}
            onMouseLeave={() => setHover(false)}
        >
            <img
                src={image.imageUrl}
                className={'ImageCard_image'}
                alt={'Nemo'}
            />
            <div className={`ImageCardTool ${ImageCardHoverClasses}`}>
                {image.longitude & image.latitude
                    ? `X: ${image.latitude}, Y: ${image.longitude}`
                    : 'location missing'}
                <br />
                {image.note ? image.note : 'No notes yet'}
            </div>
        </div>
    );
};

export default ImageCard;
