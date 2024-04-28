/**
 * Preloads images specified by the CSS selector.
 * @function
 * @param {string} [selector='img'] - CSS selector for target images.
 * @returns {Promise} - Resolves when all specified images are loaded.
 */
const preloadImages = (selector = 'img') => {
    return new Promise((resolve) => {
        let selectors = document.querySelectorAll(selector);
        if(selectors.length > 0) {
            imagesLoaded(selectors, {background: true}, resolve);
        }
        // The imagesLoaded library is used to ensure all images (including backgrounds) are fully loaded.
       
    });
};

// Exporting utility functions for use in other modules.
export {
    preloadImages
};