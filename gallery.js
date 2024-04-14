window.addEventListener('load', function () {
    const gallery = document.querySelector('.gallery');
    const navigationHeight = document.querySelector('.nav').offsetHeight;

    const adjustColumnCount = () => {
        const columnCount = 5; // Adjust this value as needed
        const columnWidth = gallery.offsetWidth / columnCount;
        const images = gallery.querySelectorAll('img');
        let totalHeight = 0;
        let columnHeights = new Array(columnCount).fill(0);

        images.forEach((image, index) => {
            const columnIndex = index % columnCount;
            const imageAspectRatio = image.naturalWidth / image.naturalHeight;
            const imageHeight = columnWidth / imageAspectRatio;
            totalHeight += imageHeight;
            columnHeights[columnIndex] += imageHeight;
            const topOffset = columnHeights[columnIndex] - imageHeight;
            image.style.position = 'absolute';
            image.style.top = `${navigationHeight + topOffset}px`; 
            image.style.left = `${columnIndex * columnWidth}px`;
            image.style.width = `${columnWidth}px`;
        });

        gallery.style.height = `${Math.max(...columnHeights)}px`;
    };

    adjustColumnCount();
    window.addEventListener('resize', adjustColumnCount);
});
