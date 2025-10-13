import { Check, X, Shield, Brain, Lock, Code } from "lucide-react";

const features = [
  {
    name: "Pensado para menores (GDPR-K, COPPA-ES)",
    description: "Cumplimiento específico con regulaciones de protección infantil europeas y estadounidenses",
    icon: Shield,
    tuytu: true,
    nightshade: false,
    photoguard: false
  },
  {
    name: "Desaprendizaje de modelos ya entrenados",
    description: "Capacidad única de hacer que modelos existentes olviden datos específicos",
    icon: Brain,
    tuytu: true,
    nightshade: true,
    photoguard: false
  },
  {
    name: "Protege píxel y metadatos",
    description: "Protección completa tanto visual como de información técnica de la imagen",
    icon: Lock,
    tuytu: true,
    nightshade: "partial",
    photoguard: "partial"
  },
  {
    name: "SDK para plataformas educativas",
    description: "Integración directa en sistemas escolares y redes sociales",
    icon: Code,
    tuytu: "Q4-25",
    nightshade: false,
    photoguard: false
  }
];

const FeatureIcon = ({ value }: { value: boolean | string }) => {
  if (value === true) {
    return <Check className="w-5 h-5 text-green-500" />;
  }
  if (value === false) {
    return <X className="w-5 h-5 text-destructive" />;
  }
  if (value === "partial") {
    return <span className="text-sm text-yellow-500 font-medium">Parcial</span>;
  }
  return <span className="text-sm text-accent font-medium">{value}</span>;
};

export const CompetitiveTable = () => {
  return (
    <section className="section-padding bg-background-secondary">
      <div className="container-grid">
        {/* Section Header */}
        <div className="text-center mb-16">
          <h2 className="font-display text-display text-center text-foreground mb-16">
            Diferencia competitiva
          </h2>
        </div>

        {/* Desktop Table View - Responsive Overflow */}
        <div className="hidden lg:block glass-panel overflow-hidden">
          <div className="overflow-x-auto">
            <table className="w-full min-w-[640px] table-auto">
                <thead>
                  <tr className="border-b border-border">
                    <th className="text-left p-6 font-display text-lg text-foreground">Característica</th>
                    <th className="text-center p-6 font-display text-lg text-primary font-bold">Tu&Tu</th>
                    <th className="text-center p-6 font-display text-lg text-foreground/70">Nightshade</th>
                    <th className="text-center p-6 font-display text-lg text-foreground/70">PhotoGuard</th>
                  </tr>
                </thead>
              <tbody>
                {features.map((feature, index) => (
                  <tr key={index} className="border-b border-border/50 hover:bg-muted/30 transition-colors">
                    <td className="p-6">
                      <div className="flex items-center gap-3">
                        <feature.icon className="w-5 h-5 text-primary" />
                        <div>
                          <div className="font-medium text-foreground">{feature.name}</div>
                          <div className="text-small text-foreground/60 mt-1">{feature.description}</div>
                        </div>
                      </div>
                    </td>
                    <td className="p-6 text-center">
                      <FeatureIcon value={feature.tuytu} />
                    </td>
                    <td className="p-6 text-center">
                      <FeatureIcon value={feature.nightshade} />
                    </td>
                    <td className="p-6 text-center">
                      <FeatureIcon value={feature.photoguard} />
                    </td>
                  </tr>
                ))}
              </tbody>
            </table>
          </div>
        </div>

        {/* Mobile Card View */}
        <div className="lg:hidden space-y-6">
          {features.map((feature, index) => (
            <div key={index} className="glass-panel p-6">
              <div className="flex items-start gap-3 mb-4">
                <feature.icon className="w-6 h-6 text-primary mt-1 flex-shrink-0" />
                <div>
                  <h3 className="font-display text-lg text-foreground mb-2">{feature.name}</h3>
                  <p className="text-body text-foreground/70">{feature.description}</p>
                </div>
              </div>
              
              <div className="responsive-grid-2 gap-4">
                <div className="space-y-3">
                  <div className="flex justify-between items-center p-3 bg-primary/10 rounded-lg">
                    <span className="font-medium text-primary font-bold">Tu&Tu</span>
                    <FeatureIcon value={feature.tuytu} />
                  </div>
                  <div className="flex justify-between items-center p-3 bg-muted/30 rounded-lg">
                    <span className="text-small text-foreground/70">Nightshade</span>
                    <FeatureIcon value={feature.nightshade} />
                  </div>
                </div>
                <div className="flex justify-between items-center p-3 bg-muted/30 rounded-lg">
                  <span className="text-small text-foreground/70">PhotoGuard</span>
                  <FeatureIcon value={feature.photoguard} />
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};