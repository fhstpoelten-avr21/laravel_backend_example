require('./bootstrap')

// or use require, if you prefer
const SwaggerUI = require('swagger-ui')

SwaggerUI({
    dom_id: '#swaggerContainer',
    url: '/api/v1/documentation/api-docs.yml',
    supportedSubmitMethods: process.env.MIX_APP_ENV === 'development' ? ['get', 'put', 'post', 'delete', 'patch'] : ['get'],
    presets: [
        SwaggerUI.presets.apis,
        SwaggerUI.SwaggerUIStandalonePreset
    ],
});
