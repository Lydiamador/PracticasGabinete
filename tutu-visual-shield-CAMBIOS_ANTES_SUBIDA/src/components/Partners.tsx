import { useEffect, useRef, useState } from "react";

export const Partners = () => {
  const [isVisible, setIsVisible] = useState(false);
  const sectionRef = useRef<HTMLElement>(null);

  useEffect(() => {
    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) {
          setIsVisible(true);
        }
      },
      { threshold: 0.2 }
    );

    if (sectionRef.current) {
      observer.observe(sectionRef.current);
    }

    return () => observer.disconnect();
  }, []);

  return (
    <section ref={sectionRef} className="section-padding bg-background-secondary">
      <div className="container-grid">
        {/* Section Header */}
        <div className="text-center mb-16">
          <h2 className={`font-display text-display text-foreground mb-6 transition-all duration-800 ${isVisible ? 'animate-fade-in-up' : 'opacity-0'}`}>
            Validación & Partners
          </h2>
          <p className={`text-body-large text-foreground/70 max-w-3xl mx-auto transition-all duration-800 delay-200 ${isVisible ? 'animate-fade-in-up' : 'opacity-0'}`}>
            Instituciones líderes en tecnología y ciberseguridad
          </p>
        </div>

        {/* Partners Logos */}
        <div className={`flex flex-wrap justify-center items-stretch gap-6 mb-16 transition-all duration-800 delay-400 ${isVisible ? 'animate-fade-in-up' : 'opacity-0'}`}>
          {/* INCIBE */}
          <a 
            href="https://www.incibe.es/" 
            target="_blank" 
            rel="noopener noreferrer"
            className="glass-panel-strong p-8 hover-lift group flex-1 min-w-[280px] max-w-[320px] cursor-pointer"
            aria-label="Visitar Instituto Nacional de Ciberseguridad"
          >
            <div className="flex flex-col items-center text-center h-full">
              <div className="flex-1 flex items-center justify-center mb-6">
                <img 
                  src="/lovable-uploads/40eed746-003b-46ba-bcc8-ffda6f9f68bb.png" 
                  alt="INCIBE Logo" 
                  className="max-h-20 max-w-full w-auto object-contain group-hover:scale-105 transition-transform duration-300"
                  loading="lazy"
                />
              </div>
              <div className="text-sm text-foreground/70 leading-tight font-medium">
                Instituto Nacional de Ciberseguridad
              </div>
            </div>
          </a>
          
          {/* NextAI */}
          <a 
            href="https://nextai.pro/" 
            target="_blank" 
            rel="noopener noreferrer"
            className="glass-panel-strong p-8 hover-lift group flex-1 min-w-[280px] max-w-[320px] cursor-pointer"
            aria-label="Visitar NextAI - Consultora especializada en IA"
          >
            <div className="flex flex-col items-center text-center h-full">
              <div className="flex-1 flex items-center justify-center mb-6">
                <img 
                  src="/lovable-uploads/eaac448a-1ab2-4a91-b155-b7f214425a6c.png" 
                  alt="NextAI Logo" 
                  className="max-h-20 max-w-full w-auto object-contain group-hover:scale-105 transition-transform duration-300"
                  loading="lazy"
                />
              </div>
              <div className="text-sm text-foreground/70 leading-tight font-medium">
                Consultora especializada en IA
              </div>
            </div>
          </a>

          {/* Instituto de Diseño y Fabricación */}
          <a 
            href="https://institutoidf.com/" 
            target="_blank" 
            rel="noopener noreferrer"
            className="glass-panel-strong p-8 hover-lift group flex-1 min-w-[280px] max-w-[320px] cursor-pointer"
            aria-label="Visitar Instituto de Investigación en Diseño y Fabricación"
          >
            <div className="flex flex-col items-center text-center h-full">
              <div className="flex-1 flex items-center justify-center mb-6">
                <img 
                  src="/lovable-uploads/2ffbd5b7-d496-41d5-ab3f-93802b79505b.png" 
                  alt="Instituto de Diseño y Fabricación Logo" 
                  className="max-h-20 max-w-full w-auto object-contain group-hover:scale-105 transition-transform duration-300"
                  loading="lazy"
                />
              </div>
              <div className="text-sm text-foreground/70 leading-tight font-medium">
                Instituto de Investigación en Diseño
              </div>
            </div>
          </a>
        </div>


        {/* Validation Metrics */}
        <div className={`mt-16 transition-all duration-800 delay-800 ${isVisible ? 'animate-fade-in-up' : 'opacity-0'}`}>
          <div className="text-center mb-12">
            <h3 className="font-display text-heading gradient-text mb-4">
              Respaldo que protege
            </h3>
            <p className="text-body text-foreground/70 max-w-2xl mx-auto">
              Validados por instituciones líderes y respaldados por cifras que demuestran nuestra eficacia
            </p>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
            
            <div className="text-center">
              <div className="glass-panel p-6">
                <div className="text-primary text-3xl font-display mb-2 font-bold">€1.2M</div>
                <p className="text-foreground/60 text-sm">Ronda Seed objetivo</p>
              </div>
            </div>
            
            <div className="text-center">
              <div className="glass-panel p-6">
                <div className="text-primary text-3xl font-display mb-2 font-bold">99%</div>
                <p className="text-foreground/60 text-sm">Tasa de bloqueo SD XL</p>
              </div>
            </div>
            
            <div className="text-center">
              <div className="glass-panel p-6">
                <div className="text-primary text-3xl font-display mb-2 font-bold">Q3-25</div>
                <p className="text-foreground/60 text-sm">Lanzamiento Beta</p>
              </div>
            </div>

          </div>
        </div>

        {/* Recognition Badges */}
        <div className={`mt-12 flex justify-center transition-all duration-800 delay-1000 ${isVisible ? 'animate-fade-in-up' : 'opacity-0'}`}>
          <div className="flex flex-wrap justify-center gap-4">
            <span className="text-xs bg-glass-bg border border-glass-border px-4 py-2 rounded-full text-foreground/60 backdrop-blur-premium">
              🏆 INCIBE Validated
            </span>
            <span className="text-xs bg-glass-bg border border-glass-border px-4 py-2 rounded-full text-foreground/60 backdrop-blur-premium">
              🚀 Ciber Impulsa Program
            </span>
            <span className="text-xs bg-glass-bg border border-glass-border px-4 py-2 rounded-full text-foreground/60 backdrop-blur-premium">
              🔒 Child Protection Focus
            </span>
          </div>
        </div>
      </div>
    </section>
  );
};