import { Button } from "@/components/ui/button";
import { Download, Users, Shield } from "lucide-react";

export const FamilyGuide = () => {
  const handleGuideDownload = () => {
    window.open('https://drive.google.com/file/d/1tBf98K3ByT80OqORRWKhyLw91uqaJhgu/view?usp=sharing', '_blank');
  };

  return (
    <section className="section-padding bg-primary/5">
      <div className="max-w-6xl mx-auto">
        <div className="text-center mb-12">
          <h2 className="font-display text-4xl md:text-5xl mb-6 gradient-text">
            Guía para Familias
          </h2>
          <p className="text-xl text-foreground/70 max-w-3xl mx-auto leading-relaxed">
            Todo lo que necesitas saber para proteger a tus hijos en la era digital
          </p>
        </div>

        <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
          {/* Left Side - Information */}
          <div className="space-y-8">
            <div className="flex items-start space-x-4">
              <div className="flex-shrink-0 w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                <Shield className="w-6 h-6 text-primary" />
              </div>
              <div>
                <h3 className="font-display text-xl text-foreground mb-2">
                  Protección Digital
                </h3>
                <p className="text-foreground/70 leading-relaxed">
                  Aprende cómo proteger las imágenes de tus hijos contra el uso malicioso de IA y deepfakes.
                </p>
              </div>
            </div>

            <div className="flex items-start space-x-4">
              <div className="flex-shrink-0 w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                <Users className="w-6 h-6 text-primary" />
              </div>
              <div>
                <h3 className="font-display text-xl text-foreground mb-2">
                  Educación Familiar
                </h3>
                <p className="text-foreground/70 leading-relaxed">
                  Herramientas y consejos prácticos para hablar con tus hijos sobre la seguridad digital.
                </p>
              </div>
            </div>

            <div className="flex items-start space-x-4">
              <div className="flex-shrink-0 w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                <Download className="w-6 h-6 text-primary" />
              </div>
              <div>
                <h3 className="font-display text-xl text-foreground mb-2">
                  Guía Práctica
                </h3>
                <p className="text-foreground/70 leading-relaxed">
                  Pasos concretos que puedes seguir hoy mismo para aumentar la protección de tu familia.
                </p>
              </div>
            </div>
          </div>

          {/* Right Side - CTA */}
          <div className="glass-panel p-8 text-center">
            <div className="mb-6">
              <div className="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                <Users className="w-10 h-10 text-primary" />
              </div>
              <h3 className="font-display text-2xl text-foreground mb-4">
                Descarga Gratuita
              </h3>
              <p className="text-foreground/70 mb-6 leading-relaxed">
                Una guía completa y práctica para familias preocupadas por la seguridad digital de sus hijos.
              </p>
            </div>
            
            <Button
              onClick={handleGuideDownload}
              className="w-full bg-primary-gradient hover:shadow-lg hover:shadow-primary/30 text-white font-semibold transition-all duration-300 text-lg py-6"
            >
              <Download className="w-5 h-5 mr-2" />
              Descargar Guía para Familias
            </Button>
            
            <p className="text-xs text-foreground/60 mt-4">
              PDF gratuito · Sin registro requerido · Actualizado 2025
            </p>
          </div>
        </div>
      </div>
    </section>
  );
};