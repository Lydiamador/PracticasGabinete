import type { Config } from "tailwindcss";

export default {
	darkMode: ["class"],
	content: [
		"./pages/**/*.{ts,tsx}",
		"./components/**/*.{ts,tsx}",
		"./app/**/*.{ts,tsx}",
		"./src/**/*.{ts,tsx}",
	],
	prefix: "",
	theme: {
		container: {
			center: true,
			padding: '2rem',
		screens: {
			'xs': '360px',
			'sm': '640px',
			'md': '768px',
			'lg': '1024px',
			'xl': '1280px',
			'2xl': '1400px'
		}
		},
		extend: {
			colors: {
				border: 'hsl(var(--border))',
				input: 'hsl(var(--input))',
				ring: 'hsl(var(--ring))',
				background: {
					DEFAULT: 'hsl(var(--background))',
					secondary: 'hsl(var(--background-secondary))',
					tertiary: 'hsl(var(--background-tertiary))'
				},
				foreground: 'hsl(var(--foreground))',
				primary: {
					DEFAULT: 'hsl(var(--primary))',
					foreground: 'hsl(var(--primary-foreground))'
				},
				secondary: {
					DEFAULT: 'hsl(var(--secondary))',
					foreground: 'hsl(var(--secondary-foreground))'
				},
				destructive: {
					DEFAULT: 'hsl(var(--destructive))',
					foreground: 'hsl(var(--destructive-foreground))'
				},
				muted: {
					DEFAULT: 'hsl(var(--muted))',
					foreground: 'hsl(var(--muted-foreground))'
				},
				accent: {
					DEFAULT: 'hsl(var(--accent))',
					foreground: 'hsl(var(--accent-foreground))'
				},
				popover: {
					DEFAULT: 'hsl(var(--popover))',
					foreground: 'hsl(var(--popover-foreground))'
				},
				card: {
					DEFAULT: 'hsl(var(--card))',
					foreground: 'hsl(var(--card-foreground))'
				},
				sidebar: {
					DEFAULT: 'hsl(var(--sidebar-background))',
					foreground: 'hsl(var(--sidebar-foreground))',
					primary: 'hsl(var(--sidebar-primary))',
					'primary-foreground': 'hsl(var(--sidebar-primary-foreground))',
					accent: 'hsl(var(--sidebar-accent))',
					'accent-foreground': 'hsl(var(--sidebar-accent-foreground))',
					border: 'hsl(var(--sidebar-border))',
					ring: 'hsl(var(--sidebar-ring))'
				},
				// Brand Colors
				brand: {
					blue: 'hsl(var(--brand-blue))',
					purple: 'hsl(var(--brand-purple))',
					cyan: 'hsl(var(--brand-cyan))',
					dark: 'hsl(var(--brand-dark))'
				},
				// Glass System
				glass: {
					bg: 'var(--glass-bg)',
					'bg-strong': 'var(--glass-bg-strong)',
					border: 'var(--glass-border)',
					'border-strong': 'var(--glass-border-strong)'
				}
			},
			backgroundImage: {
				'gradient-primary': 'var(--gradient-primary)',
				'gradient-secondary': 'var(--gradient-secondary)',
				'gradient-hero': 'var(--gradient-hero)',
				'gradient-glass': 'var(--gradient-glass)',
				'aurora': 'radial-gradient(ellipse at top, hsla(var(--brand-blue), 0.08) 0%, hsla(var(--brand-purple), 0.04) 35%, hsla(var(--brand-cyan), 0.02) 70%, transparent 100%)'
			},
			spacing: {
				'grid': '30px',
				'section': '120px',
				'30': '30px'
			},
			maxWidth: {
				'content': 'var(--content-max-width)'
			},
			backdropBlur: {
				'premium': 'var(--backdrop-blur)'
			},
			boxShadow: {
				'soft': 'var(--shadow-soft)',
				'medium': 'var(--shadow-medium)',
				'strong': 'var(--shadow-strong)',
				'glow-primary': 'var(--glow-primary)',
				'glow-accent': 'var(--glow-accent)',
				'glow-cyan': 'var(--glow-cyan)'
			},
			fontFamily: {
				'display': ['TT Norms Pro', 'system-ui', '-apple-system', 'sans-serif'],
				'inter': ['Inter', 'system-ui', '-apple-system', 'sans-serif']
			},
			borderRadius: {
				lg: 'var(--radius)',
				md: 'calc(var(--radius) - 2px)',
				sm: 'calc(var(--radius) - 4px)'
			},
			keyframes: {
				// Accordion
				'accordion-down': {
					from: { height: '0' },
					to: { height: 'var(--radix-accordion-content-height)' }
				},
				'accordion-up': {
					from: { height: 'var(--radix-accordion-content-height)' },
					to: { height: '0' }
				},
				
				// Elegant Logo Breathing - Simplified
				'logo-breathe': {
					'0%, 100%': { 
						transform: 'scale(1)',
						filter: 'drop-shadow(0 8px 24px hsla(var(--brand-blue), 0.25))'
					},
					'50%': { 
						transform: 'scale(1.03)',
						filter: 'drop-shadow(0 12px 32px hsla(var(--brand-blue), 0.4))'
					}
				},
				
				// Smooth Particle Float
				'particle-float': {
					'0%, 100%': { 
						transform: 'translateY(0px)',
						opacity: '0.6'
					},
					'50%': { 
						transform: 'translateY(-12px)',
						opacity: '1'
					}
				},
				
				// Elegant Entrance
				'fade-in-up': {
					'0%': {
						opacity: '0',
						transform: 'translateY(24px)'
					},
					'100%': {
						opacity: '1',
						transform: 'translateY(0px)'
					}
				},
				
				// Smooth Scale
				'scale-in': {
					'0%': {
						opacity: '0',
						transform: 'scale(0.95)'
					},
					'100%': {
						opacity: '1',
						transform: 'scale(1)'
					}
				},
				
				// Premium Pulse
				'pulse-premium': {
					'0%, 100%': { 
						opacity: '0.8',
						transform: 'scale(1)'
					},
					'50%': { 
						opacity: '1',
						transform: 'scale(1.05)'
					}
				}
			},
			animation: {
				// Core Animations
				'accordion-down': 'accordion-down 0.3s cubic-bezier(0.87, 0, 0.13, 1)',
				'accordion-up': 'accordion-up 0.3s cubic-bezier(0.87, 0, 0.13, 1)',
				
				// Elegant Logo
				'logo-breathe': 'logo-breathe 3s ease-in-out infinite',
				
				// Particle System
				'particle-float': 'particle-float 3s ease-in-out infinite',
				'particle-float-delayed': 'particle-float 3s ease-in-out infinite 1s',
				'particle-float-delayed-2': 'particle-float 3s ease-in-out infinite 2s',
				
				// Premium Effects
				'pulse-premium': 'pulse-premium 2s ease-in-out infinite',
				
				// Entrance Animations
				'fade-in-up': 'fade-in-up 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94)',
				'scale-in': 'scale-in 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94)'
			}
		}
	},
	plugins: [require("tailwindcss-animate")],
} satisfies Config;
