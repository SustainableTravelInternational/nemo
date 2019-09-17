import React, { useCallback, useMemo } from 'react';
import { useDropzone } from 'react-dropzone';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faPlus } from '@fortawesome/free-solid-svg-icons';
import StyleConstants from '../../theme/StyleConstants';

const ImageUpload = () => {
    const onDrop = useCallback(acceptedFiles => {
        // Do something with the files
    }, []);
    const {
        getRootProps,
        getInputProps,
        isDragActive,
        isDragAccept,
        isDragReject,
    } = useDropzone({
        onDrop,
        accept: 'image/*',
    });
    const baseStyle = {
        flex: 1,
        display: 'flex',
        flexDirection: 'column',
        alignItems: 'center',
        justifyContent: 'center',
        borderWidth: 1,
        borderRadius: 1,
        borderStyle: 'solid',
        borderColor: StyleConstants.colors.primary.main,
        backgroundColor: StyleConstants.colors.grey,
        color: StyleConstants.colors.primary.main,
        outline: 'none',
        transition: 'border .24s ease-in-out',
        width: 100,
        height: 100,
        margin: '10px 10px 10px 0',
    };

    const activeStyle = {
        borderColor: StyleConstants.colors.primary.dark,
        color: StyleConstants.colors.primary.dark,
    };

    const acceptStyle = {
        borderColor: '#00e676',
    };

    const rejectStyle = {
        borderColor: '#ff1744',
    };
    const style = useMemo(
        () => ({
            ...baseStyle,
            ...(isDragActive ? activeStyle : {}),
            ...(isDragAccept ? acceptStyle : {}),
            ...(isDragReject ? rejectStyle : {}),
        }),
        [
            isDragActive,
            isDragReject,
            acceptStyle,
            activeStyle,
            baseStyle,
            isDragAccept,
            rejectStyle,
        ]
    );

    return (
        <div {...getRootProps({ style })}>
            <input {...getInputProps()} />
            <FontAwesomeIcon icon={faPlus} />
        </div>
    );
};

export default ImageUpload;
