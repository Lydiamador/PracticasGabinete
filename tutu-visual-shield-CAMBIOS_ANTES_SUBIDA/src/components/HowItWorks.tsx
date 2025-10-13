import { Upload, Shield, Share } from "lucide-react";
import { useEffect, useRef, useState } from "react";

const steps = [
  {
    icon: Upload,
    title: "SUBE",
    description: "Arrastra tu foto o carpeta escolar.",
    detail: "Interface intuitiva que acepta múltiples formatos y procesa por lotes."
  },
  {
    icon: Shield,
    title: "VENENO",
    description: "Algoritmo Tu&Tu aplica un patrón invisible único.",
    detail: "Tecnología patentada que modifica píxeles de forma imperceptible pero letal para IA."
  },
  {
    icon: Share,
    title: "COMPARTE",
    description: "Si una IA intenta copiarla, la imagen la corrompe y la obliga a olvidar.",
    detail: "Protección activa que funciona incluso en modelos ya entrenados."
  }
];

export const HowItWorks = () => {
  const [visibleSteps, setVisibleSteps] = useState<number[]>([]);
  const sectionRef = useRef<HTMLElement>(null);

  useEffect(() => {
    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) {
          // Make all steps visible with staggered animation
          steps.forEach((_, index) => {
            setTimeout(() => {
              setVisibleSteps(prev => [...prev, index]);
            }, index * 200);
          });
        }
      },
      { threshold: 0.3 }
    );

    if (sectionRef.current) {
      observer.observe(sectionRef.current);
    }

    return () => observer.disconnect();
  }, []);

  return (
    <section ref={sectionRef} className="section-padding bg-brand-dark text-white relative overflow-hidden">
      {/* Simplified Background Pattern */}
      <div className="absolute inset-0 opacity-10">
        <div className="absolute top-10 left-10 w-24 h-24 border border-white/20 rounded-full"></div>
        <div className="absolute bottom-10 right-10 w-32 h-32 border border-white/10 rounded-full"></div>
      </div>

      <div className="container-grid relative z-10">
        {/* Section Header */}
        <div className="text-center mb-20">
          <h2 className="font-display text-display gradient-text mb-6">
            3 segundos, 3 capas
          </h2>
          <p className="text-body-large text-white/80 max-w-3xl mx-auto">
            Cómo actuamos para proteger cada imagen con precisión determinista
          </p>
        </div>

        {/* Steps - Clean Grid with Connecting Arrows */}
        <div className="relative">
          {/* Connecting Arrows - Hidden on Mobile */}
          <div className="hidden lg:block absolute inset-x-0 top-1/2 transform -translate-y-1/2 z-0">
            <svg className="w-full h-2" viewBox="0 0 800 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M50 10 L250 10 M350 10 L550 10" stroke="url(#gradient)" strokeWidth="2" strokeDasharray="5,5" opacity="0.6"/>
              <defs>
                <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                  <stop offset="0%" stopColor="hsl(var(--brand-blue))" />
                  <stop offset="100%" stopColor="hsl(var(--brand-cyan))" />
                </linearGradient>
              </defs>
            </svg>
          </div>
          
          <div className="grid grid-cols-1 lg:grid-cols-3 gap-12 relative z-10">
            {steps.map((step, index) => {
            const Icon = step.icon;
            const isVisible = visibleSteps.includes(index);
            
            return (
              <div
                key={index}
                className={`transition-all duration-800 ${
                  isVisible ? 'animate-fade-in-up opacity-100' : 'opacity-0'
                }`}
                style={{ animationDelay: `${index * 200}ms` }}
              >
                {/* Clean Step Card */}
                <div className="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-8 text-center hover:bg-white/10 transition-all duration-300 hover:scale-105">
                  
                  {/* Icon */}
                  <div className="w-16 h-16 mx-auto mb-6 bg-gradient-primary rounded-xl flex items-center justify-center">
                    <Icon className="w-8 h-8 text-white" />
                  </div>
                  
                  {/* Step Number & Title */}
                  <div className="mb-4">
                    <div className="text-xs font-mono text-brand-cyan mb-2 opacity-70">
                      PASO {index + 1}
                    </div>
                    <h3 className="font-display text-xl text-white mb-3">
                      {step.title}
                    </h3>
                  </div>
                  
                  {/* Description */}
                  <p className="text-white/70 leading-relaxed mb-3 text-sm">
                    {step.description}
                  </p>
                  
                  {/* Detail */}
                  <p className="text-xs text-white/50 leading-relaxed">
                    {step.detail}
                  </p>
                </div>
              </div>
            );
            })}
          </div>
        </div>

        {/* Process Visualization - Enhanced Mobile Layout */}
        <div className="mt-20">
          <div className="glass-panel-strong p-6 sm:p-8 max-w-4xl mx-auto">
            <h3 className="font-display text-xl sm:text-2xl gradient-text mb-8 text-center">
              Proceso de Protección Invisible
            </h3>
            
            {/* Mobile: Vertical Layout, Desktop: Horizontal */}
            <div className="flex flex-col sm:flex-row justify-center items-center gap-6 sm:gap-8">
              <div className="flex flex-col sm:flex-row items-center gap-3">
                <div className="w-5 h-5 bg-brand-blue rounded-full animate-pulse-premium"></div>
                <span className="text-sm font-medium text-white">Análisis</span>
              </div>
              
              <div className="hidden sm:block w-12 h-px bg-gradient-to-r from-brand-blue to-brand-purple"></div>
              <div className="sm:hidden w-px h-8 bg-gradient-to-b from-brand-blue to-brand-purple"></div>
              
              <div className="flex flex-col sm:flex-row items-center gap-3">
                <div className="w-5 h-5 bg-brand-purple rounded-full animate-pulse-premium" style={{ animationDelay: '0.5s' }}></div>
                <span className="text-sm font-medium text-white">Inyección</span>
              </div>
              
              <div className="hidden sm:block w-12 h-px bg-gradient-to-r from-brand-purple to-brand-cyan"></div>
              <div className="sm:hidden w-px h-8 bg-gradient-to-b from-brand-purple to-brand-cyan"></div>
              
              <div className="flex flex-col sm:flex-row items-center gap-3">
                <div className="w-5 h-5 bg-brand-cyan rounded-full animate-pulse-premium" style={{ animationDelay: '1s' }}></div>
                <span className="text-sm font-medium text-white">Protección</span>
              </div>
            </div>
            
            <div className="mt-8 text-center">
              <p className="text-xs text-white/60 max-w-lg mx-auto leading-relaxed">
                Cada imagen es procesada individualmente con algoritmos únicos y deterministas
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};