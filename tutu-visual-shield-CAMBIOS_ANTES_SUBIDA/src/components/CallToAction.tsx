import { useEffect, useState } from "react";
const logoImage = "/lovable-uploads/f1a3799d-599c-4cb7-8a2b-05f9c9112e76.png";

export const CallToAction = () => {
  const [isVisible, setIsVisible] = useState(false);

  useEffect(() => {
    const timer = setTimeout(() => setIsVisible(true), 100);
    return () => clearTimeout(timer);
  }, []);

  return (
    <section className="section-padding bg-brand-dark text-white text-center relative overflow-hidden">
      
      {/* Dark Overlay for Better Contrast */}
      <div className="absolute inset-0 bg-gradient-to-br from-brand-dark via-brand-dark/95 to-brand-dark/90"></div>
      
      {/* Subtle Background Pattern */}
      <div className="absolute inset-0 opacity-10">
        <div className="absolute top-20 left-20 w-2 h-2 bg-brand-blue rounded-full animate-particle-float"></div>
        <div className="absolute top-1/3 right-32 w-3 h-3 bg-brand-cyan rounded-full animate-particle-float-delayed"></div>
        <div className="absolute bottom-32 left-1/3 w-2 h-2 bg-brand-purple rounded-full animate-particle-float-delayed-2"></div>
      </div>

      <div className="container-grid relative z-10">
        
        {/* Logo - Simplified */}
        <div className={`mb-12 transition-all duration-800 ${isVisible ? 'animate-fade-in-up' : 'opacity-0'}`}>
          <div className="w-24 h-24 mx-auto animate-logo-breathe">
            <img 
              src={logoImage} 
              alt="Tu&Tu Logo" 
              className="w-full h-full object-contain"
            />
          </div>
        </div>

        {/* Main Headline - Fixed Contrast */}
        <h2 className={`font-display text-hero text-white mb-8 text-balance max-w-4xl mx-auto transition-all duration-1000 delay-200 ${isVisible ? 'animate-fade-in-up' : 'opacity-0'}`}>
          Únete a la defensa colectiva
        </h2>
        
        {/* Subheadline - Enhanced Contrast */}
        <p className={`text-body-large mb-16 text-white text-balance max-w-3xl mx-auto transition-all duration-1000 delay-400 ${isVisible ? 'animate-fade-in-up' : 'opacity-0'}`}>
          <strong className="text-brand-cyan">Cada 2 segundos se sube un deepfake sexual.</strong> Tu&Tu coloca un escudo donde las plataformas aún no llegan.
        </p>
        
        {/* Visual Call to Action */}
        <div className={`flex flex-col items-center gap-8 transition-all duration-1000 delay-600 ${isVisible ? 'animate-scale-in' : 'opacity-0'}`}>
          
          {/* Shield Animation */}
          <div className="relative">
            <div className="w-32 h-32 glass-panel-strong rounded-full backdrop-blur-premium animate-premium-glow flex items-center justify-center group cursor-pointer hover:scale-110 transition-all duration-500">
              
              {/* Shield Icon */}
              <div className="w-16 h-20 border-4 border-white rounded-full border-l-transparent transform rotate-12 group-hover:rotate-0 transition-transform duration-500"></div>
              
              {/* Pulse Rings */}
              <div className="absolute inset-0 rounded-full border-2 border-white/20 animate-pulse-premium"></div>
              <div className="absolute inset-[-10px] rounded-full border border-white/10 animate-pulse-premium" style={{ animationDelay: '0.5s' }}></div>
            </div>
            
            {/* Floating Elements */}
            <div className="absolute -top-2 -left-2 w-4 h-4 bg-white/40 rounded-full animate-pulse-premium"></div>
            <div className="absolute -bottom-2 -right-2 w-3 h-3 bg-white/30 rounded-full animate-pulse-premium" style={{ animationDelay: '1s' }}></div>
          </div>

          {/* Action Text - Better Contrast */}
          <div className="text-center">
            <p className="text-lg font-semibold mb-2 text-white">
              Únete a la revolución de la protección digital
            </p>
            <p className="text-sm text-white/90 max-w-md mx-auto">
              Sé parte de la primera línea de defensa contra el abuso digital infantil
            </p>
          </div>

        </div>

        {/* Urgency Indicator */}
        <div className={`mt-16 transition-all duration-1000 delay-800 ${isVisible ? 'animate-fade-in-up' : 'opacity-0'}`}>
          <div className="glass-panel p-6 max-w-md mx-auto">
            <div className="flex items-center justify-center gap-3 mb-2">
              <div className="w-2 h-2 bg-destructive rounded-full animate-pulse-premium"></div>
              <span className="text-sm font-semibold text-white">URGENTE</span>
              <div className="w-2 h-2 bg-destructive rounded-full animate-pulse-premium"></div>
            </div>
            <p className="text-xs text-white/90">
              Cada día que esperamos, más menores están en riesgo
            </p>
          </div>
        </div>

      </div>
    </section>
  );
};