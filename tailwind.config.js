/** @type {import('tailwindcss').Config} */
export default {

  daisyui: {
    themes: [
      {
        mytheme: {
        
"primary": "#25aa73",
        
"secondary": "#42c4ac",
        
"accent": "#faffa8",
        
"neutral": "#302037",
        
"base-100": "#ffffff",
        
"info": "#388af5",
        
"success": "#36e29d",
        
"warning": "#fdd463",
        
"error": "#eb6b6b",
        },
      },
    ],
  },

  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue", 
    "./node_modules/flowbite/**/*.js"
    
  ],
  theme: {
    extend: {
      animation: {
        blob: "blob 4s infinite"

      },
      keyframes: {
        blob: {
          "0%": {
            transform: "translate(0px, 0px) scale(1)",
          },
          "33%": {
            transform: "translate(30px, -50px) scale(1.2)",
          },
          "66%": {
            transform: "translate(-20px, 20px) scale(0.8)",
          },
          "100%": {
            transform: "translate(0px, 0px) scale(1)",
          }
        }
      }
      // ...
    },
  },
  plugins: [require("daisyui"),
            require('flowbite/plugin'),
            require('flowbite-typography'),
            
          ],
          
  
}

