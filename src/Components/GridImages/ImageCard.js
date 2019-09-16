import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import {
    Card,
    CardHeader,
    CardMedia,
    CardContent,
    Avatar,
    Typography,
} from '@material-ui/core';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faMapMarkerAlt } from '@fortawesome/free-solid-svg-icons';

const useStyles = makeStyles(theme => ({
    card: {
        maxWidth: 480,
        minWidth: 400,
    },
    textPadding: {
        padding: 0,
        paddingTop: 5,
        paddingBottom: 5,
    },
    media: {
        height: 0,
        paddingTop: '75%', // 4:3
        borderRadius: '6px',
    },
    avatar: {
        backgroundColor: '#f79620',
    },
}));

const ImageCard = props => {
    const { image } = props;
    const classes = useStyles();
    return (
        <Card className={classes.card}>
            <CardHeader
                className={`${classes.cardHeader} ${classes.textPadding}`}
                avatar={
                    <Avatar aria-label="recipe" className={classes.avatar}>
                        {image.username ? image.username.charAt(0) : 'N'}
                    </Avatar>
                }
                title={image.username ? image.username : 'Nemo'}
                subheader={
                    <Typography variant={'caption'}>
                        14 Sep at 03:45PM
                    </Typography>
                }
            />
            <CardMedia
                className={classes.media}
                image={image.imageUrl}
                title={image.id}
            />
            <CardContent className={classes.textPadding}>
                <Typography variant="body2" color="textSecondary" component="p">
                    {image.note}
                </Typography>
                {image.location && (
                    <Typography
                        variant="caption"
                        color="textSecondary"
                        component="p"
                    >
                        <FontAwesomeIcon
                            icon={faMapMarkerAlt}
                            style={{ color: '#f79620', paddingRight: 5 }}
                        />{' '}
                        {image.location}
                    </Typography>
                )}
            </CardContent>
        </Card>
    );
};

export default ImageCard;
