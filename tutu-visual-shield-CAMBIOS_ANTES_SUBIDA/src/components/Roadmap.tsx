import { useEffect, useRef, useState } from "react";

const roadmapItems = [
  {
    quarter: "Q2-25",
    title: "POC 99% bloqueo SD XL",
    description: "Prototipo funcional que demuestra 99% de efectividad bloqueando Stable Diffusion XL. Incluye métricas de rendimiento y primeras pruebas con usuarios beta.",
    objectives: ["Algoritmo de envenenamiento optimizado", "Pruebas con 10,000 imágenes", "Documentación técnica completa"],
    status: "in-progress"
  },
  {
    quarter: "Q3-25",
    title: "Beta con plugin Google Fotos",
    description: "Lanzamiento de versión beta con integración directa en Google Fotos. Procesamiento automático de imágenes subidas y protección en tiempo real.",
    objectives: ["Plugin Google Fotos funcional", "1,000 usuarios beta activos", "Feedback loop establecido"],
    status: "planned"
  },
  {
    quarter: "Sep-25",
    title: "Seed €1.2 M",
    description: "Ronda de financiación seed para acelerar desarrollo y expansión del equipo. Enfoque en inversores especializados en child safety y AI ethics.",
    objectives: ["Equipo de 8 personas", "Oficina en Madrid/Barcelona", "Partnerships estratégicos"],
    status: "planned"
  },
  {
    quarter: "Q4-25",
    title: "SDK colegios & redes",
    description: "Software Development Kit para integración en plataformas educativas y redes sociales. API robusta para protección masiva de contenido.",
    objectives: ["SDK completo documentado", "5 integraciones piloto", "Compliance GDPR-K certificado"],
    status: "planned"
  }
];

export const Roadmap = () => {
  const [visibleItems, setVisibleItems] = useState<number[]>([]);
  const sectionRef = useRef<HTMLElement>(null);

  useEffect(() => {
    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) {
          roadmapItems.forEach((_, index) => {
            setTimeout(() => {
              setVisibleItems(prev => [...prev, index]);
            }, index * 300);
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
    <section ref={sectionRef} className="section-padding bg-brand-dark text-white">
      <div className="container-grid">
        <h2 className="font-display text-display text-center gradient-text mb-16">
          Roadmap
        </h2>

        <div className="relative max-w-4xl mx-auto">
          {/* Vertical Line - Hidden on mobile */}
          <div className="absolute left-8 top-0 bottom-0 w-0.5 bg-gradient-to-b from-primary to-accent hidden md:block"></div>

          <div className="space-y-8">
            {roadmapItems.map((item, index) => (
              <div
                key={index}
                className={`relative transition-all duration-500 ${
                  visibleItems.includes(index) ? 'animate-fade-in-up opacity-100' : 'opacity-0 translate-y-8'
                }`}
              >
                {/* Timeline Dot - Hidden on mobile */}
                <div className={`absolute left-6 w-4 h-4 rounded-full border-2 bg-brand-dark z-10 hidden md:block ${
                  item.status === 'in-progress' 
                    ? 'border-accent animate-pulse-premium shadow-glow-accent' 
                    : 'border-primary'
                }`}></div>

                {/* Content Card */}
                <div className="md:ml-16 glass-panel p-6 hover-lift">
                  {/* Header */}
                  <div className="flex flex-col sm:flex-row sm:items-start sm:justify-between mb-4">
                    <div className="flex-1">
                      <div className="flex items-center gap-3 mb-2">
                        <span className="font-display text-accent text-lg">
                          {item.quarter}
                        </span>
                        {item.status === 'in-progress' && (
                          <span className="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-accent/20 text-accent">
                            En progreso
                          </span>
                        )}
                      </div>
                      <h3 className="text-xl md:text-2xl font-semibold text-white mb-3">
                        {item.title}
                      </h3>
                    </div>
                  </div>

                  {/* Description */}
                  <p className="text-body text-white/80 mb-4 leading-relaxed">
                    {item.description}
                  </p>

                  {/* Objectives */}
                  <div>
                    <h4 className="text-sm font-semibold text-white/90 mb-3 uppercase tracking-wide">
                      Objetivos clave:
                    </h4>
                    <div className="responsive-grid-2 gap-2">
                      {item.objectives.map((objective, objIndex) => (
                        <div key={objIndex} className="flex items-center gap-2">
                          <div className="w-1.5 h-1.5 bg-accent rounded-full flex-shrink-0"></div>
                          <span className="text-small text-white/70">{objective}</span>
                        </div>
                      ))}
                    </div>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
};