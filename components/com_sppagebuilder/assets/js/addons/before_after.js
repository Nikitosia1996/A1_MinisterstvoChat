(() => {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () { 
        const wrapperElements = document.querySelectorAll('.sppb-before-after-wrapper');

        wrapperElements.forEach((wrapperElement) => {
            const beforeImageElement = wrapperElement.querySelector('.sppb-image-before');
            const separatorElement = wrapperElement.querySelector('.sppb-before-after-separator');
            const beforeTitleElement = wrapperElement.querySelector('.sppb-before-title');
            const afterTitleElement = wrapperElement.querySelector('.sppb-after-title');

            let active = false;

            separatorElement.addEventListener('mousedown', handleStart);
            separatorElement.addEventListener('touchstart', handleStart);

            function handleStart(event) {
                active = true;
                event.preventDefault(); // Prevent default touch behavior

                document.body.addEventListener('mouseup', handleEnd);
                document.body.addEventListener('mouseleave', handleEnd);
                document.body.addEventListener('touchend', handleEnd);

                document.body.addEventListener('mousemove', handleMove);
                document.body.addEventListener('touchmove', handleMove);
            }

            function handleEnd() {
                active = false;

                document.body.removeEventListener('mousemove', handleMove);
                document.body.removeEventListener('touchmove', handleMove);

                document.body.removeEventListener('mouseup', handleEnd);
                document.body.removeEventListener('mouseleave', handleEnd);
                document.body.removeEventListener('touchend', handleEnd);
            }

            function handleMove(event) {
                if (!active || !beforeImageElement || !wrapperElement || !separatorElement) {
                    return;
                }

                const isInHorizontalOrientation = separatorElement.classList.contains('sppb-separator-horizontal');
                const beforeImageElementRect = beforeImageElement.getBoundingClientRect();
                const wrapperElementRect = wrapperElement.getBoundingClientRect();

                const clientX = event.touches ? event.touches[0].clientX : event.clientX;
                const clientY = event.touches ? event.touches[0].clientY : event.clientY;

                if ((isInHorizontalOrientation && clientX >= wrapperElementRect.left && clientX <= wrapperElementRect.right) ||
                    (!isInHorizontalOrientation && clientY >= wrapperElementRect.top && clientY <= wrapperElementRect.bottom)) {

                    const calculatedPosition = isInHorizontalOrientation ? clientX - wrapperElementRect.left : clientY - wrapperElementRect.top;

                    // separator position
                    beforeImageElement.style[isInHorizontalOrientation ? 'width' : 'height'] = `${calculatedPosition}px`;
                    separatorElement.style[isInHorizontalOrientation ? 'left' : 'top'] = `${calculatedPosition}px`;

                    // Title visibility
                    handleTitleVisibility(calculatedPosition, beforeTitleElement, afterTitleElement, beforeImageElementRect);
                }
            }

            function handleTitleVisibility(calculatedPosition, beforeTitleElement, afterTitleElement, beforeImageElementRect) {
                if (!beforeTitleElement || !afterTitleElement) {
                    return;
                }

                const isInHorizontalOrientation = separatorElement.classList.contains('sppb-separator-horizontal');
                const beforeTitleElementRect = beforeTitleElement.getBoundingClientRect();
                const afterTitleElementRect = afterTitleElement.getBoundingClientRect();

                if (isInHorizontalOrientation) {
                    if (calculatedPosition <= (beforeTitleElementRect.right - beforeImageElementRect.left)) {
                        beforeTitleElement.style.opacity = 0;
                    } else {
                        beforeTitleElement.style.opacity = 1;
                    }
    
                    if (calculatedPosition >= (afterTitleElementRect.left - beforeImageElementRect.left)) {
                        afterTitleElement.style.opacity = 0;
                    } else {
                        afterTitleElement.style.opacity = 1;
                    }

                    return;
                }


                if (calculatedPosition <= (beforeTitleElementRect.bottom - beforeImageElementRect.top)) {
                    beforeTitleElement.style.opacity = 0;
                } else {
                    beforeTitleElement.style.opacity = 1;
                }

                if (calculatedPosition >= (afterTitleElementRect.top - beforeImageElementRect.top)) {
                    afterTitleElement.style.opacity = 0;
                } else {
                    afterTitleElement.style.opacity = 1;
                }
            }
        })
    });
})();