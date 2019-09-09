import React, { useState } from 'react';
import './App.css';
import ImageGridContainer from './Components/Grid/ImageGridContainer';
import SingleImageContainer from './Components/SingleImage/SingleImageContainer';

function App() {
    const [view, setView] = useState('ImageGridContainer');
    const [image, setImage] = useState(null);

    const changeView = newView => setView(newView);

    const changeImage = image => setImage(image);

    return (
        <div className="App">
            {view === 'ImageGridContainer' && (
                <ImageGridContainer
                    changeImage={changeImage}
                    changeView={changeView}
                />
            )}
            {view === 'SingleImageContainer' && (
                <SingleImageContainer image={image} changeView={changeView} />
            )}
        </div>
    );
}

export default App;
