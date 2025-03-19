/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		"./src/pages/**/*.{js,ts,jsx,tsx,mdx}",
		"./src/components/**/*.{js,ts,jsx,tsx,mdx}",
		"./src/app/**/*.{js,ts,jsx,tsx,mdx}",
	],
	theme: {
		fontFamily: {
			'roboto': ['Roboto', 'font-sans']
		},
		extend: {
			colors: {
				'transparent': 'transparent',
				'current': 'currentColor',
				'primary': 'rgb(var(--primary-rgb) / <alpha-value>)',
				'secondary': 'rgb(var(--secondary-rgb) / <alpha-value>)',
				'tertiary': 'rgb(var(--tertiary-rgb) / <alpha-value>)',
				'text': 'rgb(var(--text-rgb) / <alpha-value>)',
				'light': 'rgb(var(--light-rgb) / <alpha-value>)',
				base: {
					'primary': 'rgb(var(--primary-rgb) / <alpha-value>)',
				}
			},
			container: {
				center: true,
			},
			backgroundImage: {
				"gradient-radial": "radial-gradient(var(--tw-gradient-stops))",
				"gradient-conic":
					"conic-gradient(from 180deg at 50% 50%, var(--tw-gradient-stops))",
			},
		},
		screens: {
			'xs': '0px',
			'sm': '480px',
			'md': '768px',
			'lg': '1024px',
			'xl': '1280px',
			'2xl': '1536px',
		},
	},
	plugins: [
		require('@tailwindcss/typography'),
		function ({ addComponents }) {
			addComponents({
				'.container': {
					maxWidth: '100%',
					paddingLeft: '20px',
					paddingRight: '20px',
					// '@screen sm': {
					//   maxWidth: '640px',
					// },
					// '@screen md': {
					//   maxWidth: '768px',
					// },
					// '@screen lg': {
					// 	maxWidth: '1170px',
					// },
					'@screen xl': {
						maxWidth: '1200px',
					},
				}
			})
		}
	],
};
