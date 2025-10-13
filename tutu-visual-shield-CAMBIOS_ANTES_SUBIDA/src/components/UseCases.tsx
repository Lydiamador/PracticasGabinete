import { GraduationCap, Video, Palette, FileText, Users } from "lucide-react";
import { useEffect, useRef, useState } from "react";

const useCases = [
  {
    icon: GraduationCap,
    title: "Clase 2º ESO",
    description: "Fotos de proyecto escolar que no acabarán en memes sexuales.",
    context: "Educación",
    color: "brand-blue"
  },
  {
    icon: Video,
    title: "Streamer de 16 años",
    description: "Selfies que rompen modelos NSFW.",
    context: "Creadores",
    color: "brand-purple"
  },
  {
    icon: Palette,
    title: "Artista digital",
    description: "Su estilo no será clonado por IA.",
    context: "Arte",
    color: "brand-cyan"
  },
  {
    icon: FileText,
    title: "Periodista en zona de riesgo",
    description: "Su rostro no será suplantado.",
    context: "Periodismo",
    color: "brand-blue"
  },
  {
    icon: Users,
    title: "Padres & docentes",
    description: "Álbum familiar protegido antes de subirlo.",
    context: "Familia",
    color: "brand-purple"
  }
];

export const UseCases = () => {
  const [visibleCases, setVisibleCases] = useState<number[]>([]);
  const sectionRef = useRef<HTMLElement>(null);

  useEffect(() => {
    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) {
          useCases.forEach((_, index) => {
            setTimeout(() => {
              setVisibleCases(prev => [...prev, index]);
            }, index * 150);
          });
        }
      },
      { threshold: 0.1 }
    );

    if (sectionRef.current) {
      observer.observe(sectionRef.current);
    }

    return () => observer.disconnect();
  }, []);

  return (
    <section ref={sectionRef} className="section-padding bg-background">
      <div className="container-grid">
        {/* Section Header */}
        <div className="text-center mb-20">
          <h2 className="font-display text-display gradient-text mb-6">
            Casos de uso reales
          </h2>
          <p className="text-body-large text-foreground/70 max-w-3xl mx-auto">
            Protegemos a quienes más lo necesitan: menores, artistas y activistas en situaciones vulnerables.
          </p>
        </div>

        {/* Use Cases Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
          {useCases.map((useCase, index) => {
            const Icon = useCase.icon;
            const isVisible = visibleCases.includes(index);
            
            return (
              <div
                key={index}
                className={`group cursor-pointer transition-all duration-700 ${
                  isVisible ? 'animate-scale-in opacity-100' : 'opacity-0'
                }`}
                style={{ animationDelay: `${index * 150}ms` }}
              >
                <div className="glass-panel p-8 h-full hover-glow transition-all duration-500 hover:scale-105 hover:shadow-glow-primary focus-visible:shadow-glow-primary focus-visible:scale-105" tabIndex={0} role="button">
                  
                  {/* Context Tag */}
                  <div className="mb-4">
                    <span className="text-xs font-mono text-brand-cyan bg-brand-cyan/10 px-3 py-1 rounded-full">
                      {useCase.context}
                    </span>
                  </div>

                  {/* Icon */}
                  <div className="w-14 h-14 mb-6 rounded-xl bg-gradient-primary flex items-center justify-center group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
                    <Icon className="w-7 h-7 text-white" />
                  </div>
                  
                  {/* Content */}
                  <h3 className="font-display text-xl gradient-text mb-4 group-hover:text-brand-blue transition-colors duration-300">
                    {useCase.title}
                  </h3>
                  
                  <p className="text-foreground/70 leading-relaxed font-inter text-sm">
                    {useCase.description}
                  </p>

                  {/* Hover Effect Indicator */}
                  <div className="mt-6 h-1 w-full bg-background-secondary rounded-full overflow-hidden">
                    <div className="h-full w-0 bg-gradient-primary rounded-full transition-all duration-500 group-hover:w-full"></div>
                  </div>
                </div>
              </div>
            );
          })}
        </div>

        {/* Call to Action */}
        <div className="text-center mt-20">
          <div className="glass-panel-strong p-10 max-w-4xl mx-auto">
            <h3 className="font-display text-2xl gradient-text mb-4">
              ¿Tu caso no está aquí?
            </h3>
            <p className="text-foreground/70 mb-6">
              Tu&Tu protege a cualquier persona o colectivo vulnerable. Cuéntanos tu situación.
            </p>
            <div className="flex flex-wrap justify-center gap-3">
              <span className="text-xs bg-background-tertiary px-4 py-2 rounded-full text-foreground/60">Menores</span>
              <span className="text-xs bg-background-tertiary px-4 py-2 rounded-full text-foreground/60">Artistas</span>
              <span className="text-xs bg-background-tertiary px-4 py-2 rounded-full text-foreground/60">Activistas</span>
              <span className="text-xs bg-background-tertiary px-4 py-2 rounded-full text-foreground/60">Periodistas</span>
              <span className="text-xs bg-background-tertiary px-4 py-2 rounded-full text-foreground/60">Educadores</span>
              <span className="text-xs bg-background-tertiary px-4 py-2 rounded-full text-foreground/60">Familias</span>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};