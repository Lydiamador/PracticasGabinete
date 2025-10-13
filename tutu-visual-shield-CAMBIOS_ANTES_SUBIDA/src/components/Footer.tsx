import { useState } from "react";
import { Moon, Sun } from "lucide-react";
import { Button } from "@/components/ui/button";
const logoImage = "/lovable-uploads/f1a3799d-599c-4cb7-8a2b-05f9c9112e76.png";

export const Footer = () => {

  return (
    <footer className="section-padding bg-background-tertiary border-t border-border/20">
      <div className="container-grid">
        
        {/* Main Footer Content */}
        <div className="grid grid-cols-1 lg:grid-cols-4 gap-12 mb-12">
          
          {/* Brand Section */}
          <div className="lg:col-span-2">
            <div className="flex items-center mb-6">
              <img src={logoImage} alt="Tu&Tu Logo" className="w-8 h-8 mr-3" />
              <span className="font-display text-2xl gradient-text">tu&tu</span>
            </div>
            <p className="text-foreground/70 mb-6 max-w-md leading-relaxed">
              Protegemos la imagen digital de menores y colectivos vulnerables con tecnología cuántica ética.
            </p>
            <div className="flex items-center gap-4">
              <span className="text-xs bg-background px-3 py-1 rounded-full text-foreground/60 border border-border">
                🏆 INCIBE Validated
              </span>
              <span className="text-xs bg-background px-3 py-1 rounded-full text-foreground/60 border border-border">
                🔒 Child Protection
              </span>
            </div>
          </div>

          {/* Resources */}
          <div>
            <h3 className="font-display text-lg gradient-text mb-4">Recursos</h3>
            <nav className="space-y-3">
              <a href="#" className="block text-foreground/60 hover:text-foreground transition-colors text-sm">
                Guía para familias
              </a>
              <a href="/politica-de-privacidad" className="block text-foreground/60 hover:text-foreground transition-colors text-sm">
                Política de privacidad
              </a>
              <a href="/terminos-de-uso" className="block text-foreground/60 hover:text-foreground transition-colors text-sm">
                Términos de uso
              </a>
              <a href="#" className="block text-foreground/60 hover:text-foreground transition-colors text-sm">
                Cookies
              </a>
            </nav>
          </div>

          {/* Community */}
          <div>
            <h3 className="font-display text-lg gradient-text mb-4">Comunidad</h3>
            <nav className="space-y-3">
              <a href="#" className="block text-foreground/60 hover:text-foreground transition-colors text-sm">
                Discord
              </a>
              <a href="#" className="block text-foreground/60 hover:text-foreground transition-colors text-sm">
                X (Twitter)
              </a>
              <a href="#" className="block text-foreground/60 hover:text-foreground transition-colors text-sm">
                LinkedIn
              </a>
              <a href="#" className="block text-foreground/60 hover:text-foreground transition-colors text-sm">
                GitHub
              </a>
            </nav>
          </div>
        </div>

        {/* Bottom Bar */}
        <div className="flex flex-col md:flex-row justify-between items-center gap-6 pt-8 border-t border-border/20">
          
          {/* Copyright */}
          <div className="text-center md:text-left">
            <p className="text-sm text-foreground/50 mb-1">
              © 2025 Tu&Tu. Protegiendo la infancia digital.
            </p>
            <p className="text-xs text-foreground/40">
              Hecho con ❤️ para un internet más seguro
            </p>
          </div>

          {/* Controls */}
          <div className="flex items-center gap-4">
            
            {/* Status Indicator */}
            <div className="flex items-center gap-2">
              <div className="w-2 h-2 bg-green-500 rounded-full animate-pulse-premium"></div>
              <span className="text-xs text-foreground/50">Sistema activo</span>
            </div>
          </div>
        </div>

        {/* Legal Disclaimer */}
        <div className="mt-8 pt-6 border-t border-border/10">
          <p className="text-xs text-foreground/40 text-center leading-relaxed max-w-4xl mx-auto">
            Tu&Tu es una tecnología de protección digital que modifica imperceptiblemente las imágenes para protegerlas del uso no autorizado por parte de sistemas de inteligencia artificial. 
            Esta tecnología está diseñada específicamente para proteger la privacidad y seguridad de menores y colectivos vulnerables.
          </p>
        </div>
      </div>
    </footer>
  );
};