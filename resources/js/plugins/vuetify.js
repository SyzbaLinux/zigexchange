import { createVuetify  } from 'vuetify'
import 'vuetify/styles'
import { aliases, phospor } from './custom';

export default createVuetify({

    icons: {
        defaultSet: 'phospor',
        aliases,
        sets: {
            phospor:phospor
        }
    },
    theme: {
        themes: {
            light: {
                colors: {
                    surface: "#fafafa",
                    primary: "#0165ad",
                    secondary: "#1f2937",
                    error: "#c20d0d",
                },
            },
        },
    },
    defaults: {
        VCard: {
            rounded: 'lg'
        },
        VTextField: {
            variant: 'outlined',
            density: 'comfortable',
            color: 'primary'
        },
        VTextarea: {
            variant: 'outlined',
            density: 'comfortable',
            color: 'primary'
        },
        VSelect: {
            variant: 'outlined',
            density: 'comfortable',
            color: 'primary'
        },
        VListItem: {
            minHeight: '45px'
        },
        VTooltip: {
            location: 'top'
        }
    }

})
