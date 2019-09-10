import React from 'react';
import {Grid } from '@material-ui/core'
import ImageCard from './ImageCard';

const renderImages = images => {
    return images.map(item => {
        return <ImageCard image={item} key={item.id} />;
    });
};

const ImageGrid = props => {
    const { images } = props;

    return (<Grid
  container
  direction="row-reverse"
  justify="center"
  alignItems="stretch"
>{renderImages(images)}</Grid>);
};

export default ImageGrid;
