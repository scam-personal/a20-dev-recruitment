module.exports = {
    theme: {
        extend: {
            screens: {
                'xs': { 'max': '600px' },
                'smm': { 'min': '600px' },
                'mdd': { 'min': '768px' },
                'lgg': { 'min': '992px' },
                'xll': { 'min': '1200px' }
            },
            minHeight: {
                '0': '0',
                '36': '144px',
            }
        }
    },
    variants: {
        animation: ['responsive', 'hover', 'group-hover'],
        animate: ['responsive', 'hover', 'group-hover'],
        fontSize: ['responsive', 'hover', 'group-hover'],
        transform: ['responsive', 'hover', 'group-hover'],
        scale: ['responsive', 'hover', 'group-hover'],
        padding: ['responsive', 'hover', 'group-hover']
    }
}