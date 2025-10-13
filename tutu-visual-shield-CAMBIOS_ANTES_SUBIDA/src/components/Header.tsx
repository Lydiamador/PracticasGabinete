import { useState } from "react";
import { Button } from "@/components/ui/button";
import { Menu, X, Download, Moon, Sun } from "lucide-react";
import { Link } from "react-router-dom";

const logoImage = "/lovable-uploads/f1a3799d-599c-4cb7-8a2b-05f9c9112e76.png";

export const Header = () => {
  const [isMenuOpen, setIsMenuOpen] = useState(false);
  const [isDark, setIsDark] = useState(false);

  const toggleTheme = () => {
    setIsDark(!isDark);
    document.documentElement.classList.toggle("dark");
  };

  const handleInvestorPDF = () => {
    window.open('https://drive.google.com/file/d/1ffCtl9ggzllQAJgyE1uXM78YeGhl9jlg/view?usp=sharing', '_blank');
  };

  const scrollToInvestorSection = () => {
    setIsMenuOpen(false);
    document.getElementById('investor-download-button')?.scrollIntoView({ behavior: 'smooth' });
  };

  return (
    <header className="fixed top-0 left-0 right-0 z-50 bg-background/80 backdrop-blur-md border-b border-border">
      <div className="container mx-auto px-4">
        <div className="flex items-center justify-between h-16">
          {/* Logo */}
          <Link to="/" className="flex items-center space-x-2">
            <img src={logoImage} alt="Tu&Tu Logo" className="w-8 h-8" />
            <span className="font-display text-xl font-bold text-foreground">Tu&Tu</span>
          </Link>

          {/* Desktop Navigation */}
          <nav className="hidden md:flex items-center space-x-6">
            <Link to="/" className="text-foreground/70 hover:text-foreground transition-colors duration-200">
              Inicio
            </Link>
            <Link to="/politica-de-privacidad" className="text-foreground/70 hover:text-foreground transition-colors duration-200">
              Privacidad
            </Link>
            <Link to="/politica-de-cookies" className="text-foreground/70 hover:text-foreground transition-colors duration-200">
              Cookies
            </Link>
            <Link to="/terminos-de-uso" className="text-foreground/70 hover:text-foreground transition-colors duration-200">
              Términos
            </Link>
            <Link to="/contacto" className="text-foreground/70 hover:text-foreground transition-colors duration-200">
              Contacto
            </Link>
            <Button
              variant="outline"
              size="sm"
              onClick={() => window.open('https://drive.google.com/file/d/1tBf98K3ByT80OqORRWKhyLw91uqaJhgu/view?usp=sharing', '_blank')}
              className="border-primary/30 text-primary hover:bg-primary/10"
            >
              <Download className="w-4 h-4 mr-2" />
              Guía Familias
            </Button>
            <Button
              variant="outline"
              size="sm"
              onClick={handleInvestorPDF}
              className="border-primary/30 text-primary hover:bg-primary/10"
            >
              <Download className="w-4 h-4 mr-2" />
              PDF Inversores
            </Button>

            {/* Theme Toggle */}
            <Button
              variant="ghost"
              size="sm"
              onClick={toggleTheme}
              className="text-foreground/60 hover:text-foreground hover:bg-background-secondary transition-all duration-300 p-2 ml-2"
            >
              {isDark ? <Sun className="w-4 h-4" /> : <Moon className="w-4 h-4" />}
            </Button>
          </nav>

          {/* Mobile Menu Button */}
          <button
            onClick={() => setIsMenuOpen(!isMenuOpen)}
            className="md:hidden p-2 rounded-lg hover:bg-muted transition-colors duration-200"
          >
            {isMenuOpen ? <X className="w-5 h-5 text-foreground" /> : <Menu className="w-5 h-5 text-foreground" />}
          </button>
        </div>

        {/* Mobile Navigation */}
        {isMenuOpen && (
          <div className="md:hidden border-t border-border bg-background/95 backdrop-blur-md">
            <nav className="py-4 space-y-3">
              <Link to="/" onClick={() => setIsMenuOpen(false)} className="block px-4 py-2 text-foreground/70 hover:text-foreground hover:bg-muted rounded-lg transition-colors duration-200">
                Inicio
              </Link>
              <Link to="/politica-de-privacidad" onClick={() => setIsMenuOpen(false)} className="block px-4 py-2 text-foreground/70 hover:text-foreground hover:bg-muted rounded-lg transition-colors duration-200">
                Privacidad
              </Link>
              <Link to="/politica-de-cookies" onClick={() => setIsMenuOpen(false)} className="block px-4 py-2 text-foreground/70 hover:text-foreground hover:bg-muted rounded-lg transition-colors duration-200">
                Cookies
              </Link>
              <Link to="/terminos-de-uso" onClick={() => setIsMenuOpen(false)} className="block px-4 py-2 text-foreground/70 hover:text-foreground hover:bg-muted rounded-lg transition-colors duration-200">
                Términos
              </Link>
              <Link to="/contacto" onClick={() => setIsMenuOpen(false)} className="block px-4 py-2 text-foreground/70 hover:text-foreground hover:bg-muted rounded-lg transition-colors duration-200">
                Contacto
              </Link>
              <button
                onClick={() => {
                  setIsMenuOpen(false);
                  window.open('https://drive.google.com/file/d/1tBf98K3ByT80OqORRWKhyLw91uqaJhgu/view?usp=sharing', '_blank');
                }}
                className="w-full text-left px-4 py-2 text-primary hover:bg-primary/10 rounded-lg transition-colors duration-200 flex items-center"
              >
                <Download className="w-4 h-4 mr-2" />
                Guía Familias
              </button>
              <button
                onClick={() => {
                  setIsMenuOpen(false);
                  handleInvestorPDF();
                }}
                className="w-full text-left px-4 py-2 text-primary hover:bg-primary/10 rounded-lg transition-colors duration-200 flex items-center"
              >
                <Download className="w-4 h-4 mr-2" />
                PDF Inversores
              </button>

              {/* Theme Toggle */}
              <Button
                variant="ghost"
                size="sm"
                onClick={() => { toggleTheme(); setIsMenuOpen(false); }}
                className="px-4 py-2 text-foreground/60 hover:text-foreground hover:bg-background-secondary transition-all duration-300 rounded-lg flex items-center"
              >
                {isDark ? <Sun className="w-4 h-4 mr-2" /> : <Moon className="w-4 h-4 mr-2" />}
                {isDark ? "Modo Claro" : "Modo Oscuro"}
              </Button>
            </nav>
          </div>
        )}
      </div>
    </header>
  );
};
