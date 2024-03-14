DROP TRIGGER maj_total;
CREATE TRIGGER maj_total AFTER INSERT ON lignedecommande
    FOR EACH ROW
    BEGIN
        DECLARE id_c INT;
        DECLARE tot DOUBLE;
        DECLARE tot_remise DOUBLE;
        DECLARE remise DOUBLE;
        SET id_c = NEW.id_commande; -- nous captons le numéro de commande concerné
        SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c); -- on recalcule le total
        SET remise = (SELECT commande.remise from commande WHERE id=id_c);
        SET tot_remise = (tot*remise)/100; 
        UPDATE commande SET total=tot-tot_remise WHERE id=id_c; -- on stocke le total dans la table commande
    END;




insert into lignedecommande (id_commande, id_produit, quantite, prix)
values (1, 5, 1, 100);


select * from lignedecommande where id_commande=1;

select * from commande where id=1;

SELECT remise from commande WHERE id=1;