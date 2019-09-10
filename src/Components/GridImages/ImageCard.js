import React, { useState } from 'react';
import { navigate } from 'hookrouter';
import { makeStyles } from '@material-ui/core/styles';
import {Card, CardHeader, CardMedia, CardContent, Avatar,Typography} from '@material-ui/core';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faMapMarkerAlt } from '@fortawesome/free-solid-svg-icons'

const useStyles = makeStyles(theme => ({
  card: {
    width: 360,
    margin: 20,
  },
  textPadding: {
      padding: 0,
      paddingTop: 5,
      paddingBottom: 5,
  },
  media: {
    height: 0,
    paddingTop: '56.25%', // 16:9
    borderRadius: '6px'
  },
  avatar: {
    backgroundColor: '#f79620',
  },
}));

const ImageCard = (props) => {
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
        title={image.username? image.username : 'Nemo'}
        subheader="September 14, 2016"
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
        {image.location && <Typography variant="caption" color="textSecondary" component="p">
          <FontAwesomeIcon icon={faMapMarkerAlt} style={{color: '#f79620', paddingRight: 5}} />  {image.location}
        </Typography>}
      </CardContent>
    </Card>
  );
}

export default ImageCard;