import { Dialog, DialogContent, DialogHeader, DialogTitle } from "@/components/ui/dialog";
import { Button } from "@/components/ui/button";
import { Mail } from "lucide-react";

interface WaitlistModalProps {
  isOpen: boolean;
  onClose: () => void;
}

export const WaitlistModal = ({ isOpen, onClose }: WaitlistModalProps) => {
  const handleBetaContact = () => {
    const subject = encodeURIComponent("Solicitud de participación en Beta - Tu&Tu");
    const body = encodeURIComponent("Hola equipo de Tu&Tu,\n\nMe gustaría participar en vuestra beta de protección de imágenes.\n\nGracias");
    window.location.href = `mailto:protegeme@tuytu.tech?subject=${subject}&body=${body}`;
    onClose();
  };

  return (
    <Dialog open={isOpen} onOpenChange={onClose}>
      <DialogContent className="glass-panel border-white/20 max-w-md">
        <DialogHeader>
          <DialogTitle className="gradient-text text-2xl font-display">
            Únete a la Beta
          </DialogTitle>
        </DialogHeader>
        
        <div className="space-y-4">
          <p className="text-foreground/70 text-center leading-relaxed">
            Contáctanos directamente para participar en la beta de protección de imágenes de menores.
          </p>
          
          <Button
            onClick={handleBetaContact}
            className="w-full bg-primary-gradient hover:shadow-lg hover:shadow-primary/30 text-white font-semibold transition-all duration-300"
          >
            <Mail className="w-4 h-4 mr-2" />
            Contactar para Beta
          </Button>
          
          <p className="text-xs text-foreground/60 text-center">
            Te contactaremos por email. Protegemos tu privacidad según GDPR.
          </p>
        </div>
      </DialogContent>
    </Dialog>
  );
};