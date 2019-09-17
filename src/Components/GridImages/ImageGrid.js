import React from 'react';
import { Grid } from '@material-ui/core';
import { makeStyles } from '@material-ui/core/styles';
import StyleConstants from '../../theme/StyleConstants';
import ImageCard from './ImageCard';

const renderImages = images => {
    return images.map(item => {
        return (
            <Grid item key={item.id} xs={12} sm={12} md={6}>
                <ImageCard image={item} />
            </Grid>
        );
    });
};
const useStyles = makeStyles(theme => ({
    imageGrid: { maxWidth: StyleConstants.maxWidth, margin: 'auto' },
}));
const ImageGrid = props => {
    const { images } = props;
    const classes = useStyles();
    return (
        <Grid
            container
            direction={'row-reverse'}
            justify={'center'}
            alignItems={'stretch'}
            spacing={2}
            className={classes.imageGrid}
        >
            {renderImages(images)}
        </Grid>
    );
};

export default ImageGrid;
